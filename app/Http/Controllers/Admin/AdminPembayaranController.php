<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSewa;

class AdminPembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = PengajuanSewa::with(['user', 'kamar'])
            ->where('sudah_bayar', true)
            ->orderBy('updated_at', 'desc')
            ->get();

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
}
