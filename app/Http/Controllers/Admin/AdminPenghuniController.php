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
     * Display a listing of the active tenants.
     */
    public function index()
    {
        // Ambil user ber-role customer yang pengajuan sewanya berstatus disetujui
        $penghuni = User::where('role', 'customer')
            ->whereHas('pengajuanSewa', function ($query) {
                $query->where('status', 'disetujui');
            })
            ->with(['pengajuanSewa.kamar'])
            ->get();

        return view('admin.penghuni', compact('penghuni'));
    }

    /**
     * Display the specified tenant details.
     */
    public function show($id)
    {
        // Cari user berdasarkan ID beserta data pengajuan sewa dan kamarnya
        $penghuni = User::where('role', 'customer')
            ->with(['pengajuanSewa' => function($query) {
                $query->where('status', 'disetujui')->with('kamar');
            }])
            ->findOrFail($id);

        return view('admin.penghuni_detail', compact('penghuni'));
    }

    /**
     * Show the form for editing the specified tenant.
     */
    public function edit($id)
    {
        // Ambil data penghuni saat ini beserta pengajuan sewa aktifnya
        $penghuni = User::where('role', 'customer')
            ->with(['pengajuanSewa' => function($query) {
                $query->where('status', 'disetujui');
            }])
            ->findOrFail($id);

        // Ambil semua daftar kamar untuk opsi jika admin ingin memindahkan kamar penghuni
        $allKamar = Kamar::all();

        return view('admin.penghuni_edit', compact('penghuni', 'allKamar'));
    }

    /**
     * Update the specified tenant in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input data profil dasar penghuni
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'kamar_id' => 'required|exists:kamars,id',
        ]);

        // Update data user/penghuni
        $penghuni = User::findOrFail($id);
        $penghuni->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update atau pindahkan kamar melalui tabel relasi pengajuan_sewas
        $sewaAktif = PengajuanSewa::where('user_id', $id)
            ->where('status', 'disetujui')
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
        // Cari pengajuan sewa yang aktif disetujui untuk user tersebut
        $sewaAktif = PengajuanSewa::where('user_id', $id)
            ->where('status', 'disetujui')
            ->first();

        if ($sewaAktif) {
            // Ubah status pengajuan sewa menjadi selesai/dibatalkan agar kamar menjadi kosong kembali
            $sewaAktif->update([
                'status' => 'ditolak' // atau 'selesai' tergantung kebutuhan alur bisnis sistem Anda
            ]);
        }

        // Catatan: Jika ingin menghapus user-nya dari database sepenuhnya, buka comment line di bawah ini:
        // User::destroy($id);

        return redirect()->back()->with('success', 'Penghuni berhasil dikeluarkan dan kamar telah dikosongkan.');
    }
}
