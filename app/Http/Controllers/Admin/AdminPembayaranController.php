<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSewa;
use Illuminate\Http\Request;

class AdminPembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = PengajuanSewa::with(['user', 'kamar'])
            ->where('sudah_bayar', true)
            ->orderBy('updated_at', 'desc')
            ->get();

        // Hitung data summary secara dinamis
        $totalMasuk = $pembayaran->count();
        $menungguVerifikasi = $pembayaran->where('status', 'pending')->count();
        $terverifikasi = $pembayaran->where('status', 'disetujui')->count();
        $uploadUlang = $pembayaran->where('status', 'ditolak')->count();

        return view('admin.pembayaran', compact(
            'pembayaran',
            'totalMasuk',
            'menungguVerifikasi',
            'terverifikasi',
            'uploadUlang'
        ));
    }

    public function show($order_id)
    {
        $pengajuan = PengajuanSewa::with(['user', 'kamar'])
            ->where('order_id', $order_id)
            ->where('sudah_bayar', true)
            ->firstOrFail();

        return view('admin.pembayaran_detail', compact('pengajuan'));
    }

    /**
     * Memproses persetujuan atau penolakan pembayaran dari admin
     */
    public function verifikasi(Request $request, $order_id)
    {
        // Cari data pengajuan berdasarkan order_id
        $pengajuan = PengajuanSewa::where('order_id', $order_id)->firstOrFail();

        // Ambil nilai tombol action yang ditekan admin (setuju / tolak)
        $action = $request->input('action');
        $catatanAdmin = $request->input('catatan_admin');

        if ($action === 'setuju') {
            // Jika setuju: status menjadi disetujui
            $pengajuan->update([
                'status' => 'disetujui',
                'catatan_admin' => $catatanAdmin // menyimpan catatan jika ada
            ]);

            // Pastikan status kamar berubah menjadi 'penuh'
            if ($pengajuan->kamar) {
                $pengajuan->kamar->update([
                    'status' => 'penuh'
                ]);
            }

            return redirect('/admin/pembayaran/' . $order_id)
                ->with('success', 'Pembayaran berhasil diverifikasi. Pengajuan sewa telah disetujui.');

        } elseif ($action === 'tolak') {
            // Validasi opsional: pastikan admin mengisi catatan alasan penolakan
            $request->validate([
                'catatan_admin' => 'required|string|min:5'
            ], [
                'catatan_admin.required' => 'Silakan tulis alasan penolakan pada catatan admin terlebih dahulu.'
            ]);

            // Jika ditolak: status menjadi ditolak (calon penghuni harus upload ulang)
            $pengajuan->update([
                'status' => 'ditolak',
                'catatan' => $catatanAdmin
            ]);

            // Kembalikan status kamar menjadi 'tersedia' jika sebelumnya sempat dikuncipenuh
            if ($pengajuan->kamar) {
                $pengajuan->kamar->update([
                    'status' => 'tersedia'
                ]);
            }

            return redirect('/admin/pembayaran/' . $order_id)
                ->with('success', 'Pengajuan pembayaran telah ditolak. Penghuni diminta untuk melakukan upload ulang.');
        }

        return redirect('/admin/pembayaran/' . $order_id);
    }
}
