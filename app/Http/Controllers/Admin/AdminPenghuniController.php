<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kamar;
use App\Models\PengajuanSewa;
use Illuminate\Http\Request;

class AdminPenghuniController extends Controller
{
    /**
     * Display a listing of the active tenants based on approved payments.
     */
    public function index()
    {
        // Ambil customer yang memiliki pengajuan sewa dengan pembayaran berstatus disetujui
        $penghuni = User::where('role', 'customer')
            ->whereHas('pengajuanSewa.pembayarans', function ($query) {
                $query->where('status', 'disetujui');
            })
            ->with(['pengajuanSewa' => function($query) {
                // Ambil pengajuan sewa yang pembayarannya disetujui beserta data kamar dan pembayarannya
                $query->whereHas('pembayarans', function($q) {
                    $q->where('status', 'disetujui');
                })->with(['kamar', 'pembayarans' => function($q) {
                    $q->where('status', 'disetujui');
                }]);
            }])
            ->get();

        return view('admin.penghuni', compact('penghuni'));
    }

    /**
     * Display the specified tenant details.
     */
    public function show($id)
    {
        // Cari user berdasarkan ID yang memenuhi kriteria pembayaran disetujui
        $penghuni = User::where('role', 'customer')
            ->whereHas('pengajuanSewa.pembayarans', function ($query) {
                $query->where('status', 'disetujui');
            })
            ->with(['pengajuanSewa' => function($query) {
                $query->whereHas('pembayarans', function($q) {
                    $q->where('status', 'disetujui');
                })->with(['kamar', 'pembayarans' => function($q) {
                    $q->where('status', 'disetujui');
                }]);
            }])
            ->findOrFail($id);

        return view('admin.penghuni_detail', compact('penghuni'));
    }

    /**
     * Show the form for editing the specified tenant.
     */
    public function edit($id)
    {
        // Ambil data penghuni saat ini yang pembayaran sewanya valid
        $penghuni = User::where('role', 'customer')
            ->whereHas('pengajuanSewa.pembayarans', function ($query) {
                $query->where('status', 'disetujui');
            })
            ->with(['pengajuanSewa' => function($query) {
                $query->whereHas('pembayarans', function($q) {
                    $q->where('status', 'disetujui');
                })->with('kamar');
            }])
            ->findOrFail($id);

        // Ambil semua daftar kamar untuk pilihan opsi pindah kamar
        $allKamar = Kamar::all();

        return view('admin.penghuni_edit', compact('penghuni', 'allKamar'));
    }

    /**
     * Update the specified tenant in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input data profil dasar penghuni (Menyesuaikan kolom 'nama' dari model User)
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'kamar_id' => 'required|exists:kamars,id',
        ]);

        // Update data user/penghuni
        $penghuni = User::findOrFail($id);
        $penghuni->update([
            'nama' => $request->nama, // Menggunakan 'nama' sesuai konfigurasi fillable model User
            'email' => $request->email,
        ]);

        // Update kamar melalui pengajuan sewa yang terkait dengan pembayaran disetujui
        $sewaAktif = PengajuanSewa::where('user_id', $id)
            ->whereHas('pembayarans', function($query) {
                $query->where('status', 'disetujui');
            })
            ->first();

        if ($sewaAktif) {
            $sewaAktif->update([
                'kamar_id' => $request->kamar_id
            ]);
        }

        return redirect()->route('admin.penghuni.index')->with('success', 'Data penghuni berhasil diperbarui.');
    }

    /**
     * Remove the specified tenant from storage.
     */
    public function destroy($id)
    {
        // Cari pengajuan sewa terkait untuk pembatalan/pengosongan status sewa
        $sewaAktif = PengajuanSewa::where('user_id', $id)
            ->whereHas('pembayarans', function($query) {
                $query->where('status', 'disetujui');
            })
            ->first();

        if ($sewaAktif) {
            // Ubah status pengajuan sewa menjadi batal/ditolak agar status kamar kembali kosong/terbuka
            $sewaAktif->update([
                'status' => 'ditolak'
            ]);

            // Opsional: Jika Anda ingin membatalkan status pembayarannya juga di database
            $sewaAktif->pembayarans()->where('status', 'disetujui')->update([
                'status' => 'ditolak'
            ]);
        }

        return redirect()->back()->with('success', 'Penghuni berhasil dinonaktifkan dari kamar.');
    }
}
