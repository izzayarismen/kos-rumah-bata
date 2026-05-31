<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function index(Request $request)
    {
        $tipe = $request->get('tipe', 'bulanan');
        $bulanInput = $request->get('bulan'); // format: januari-2026
        $tahunInput = $request->get('tahun', date('Y'));

        // Daftar bulan untuk mapping nama bulan ke angka (1-12)
        $daftarBulan = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

        // Setup default query berdasarkan tipe filter
        $query = Pembayaran::query();

        if ($tipe === 'bulanan') {
            if ($bulanInput) {
                explode('-', $bulanInput);
                $parts = explode('-', $bulanInput);
                $namaBulan = $parts[0];
                $tahun = $parts[1] ?? date('Y');
            } else {
                $namaBulan = $daftarBulan[date('n') - 1];
                $tahun = date('Y');
            }

            $angkaBulan = array_search(strtolower($namaBulan), $daftarBulan) + 1;

            $query->whereMonth('tanggal_bayar', $angkaBulan)
                  ->whereYear('tanggal_bayar', $tahun);

            $periodeAktif = ucfirst($namaBulan) . ' ' . $tahun;
        } else {
            // Tahunan
            $query->whereYear('tanggal_bayar', $tahunInput);
            $periodeAktif = 'Tahun ' . $tahunInput;
        }

        // Ambil semua transaksi pada periode terpilih
        $transaksi = $query->orderBy('tanggal_bayar', 'desc')->orderBy('created_at', 'desc')->get();

        // Hitung Pendapatan & Pengeluaran
        $totalPendapatanRaw = $transaksi->where('jenis', 'pemasukan')->sum('nominal');
        $totalPengeluaranRaw = $transaksi->where('jenis', 'pengeluaran')->sum('nominal');
        $selisihBersihRaw = $totalPendapatanRaw - $totalPengeluaranRaw;

        // Hitung Jumlah Transaksi khusus Ringkasan
        $transaksiMasukCount = $transaksi->where('jenis', 'pemasukan')->count();
        $maintenanceCount = $transaksi->where('jenis', 'pengeluaran')->count();

        // Formating Mata Uang Rupiah
        $totalPendapatan = 'Rp ' . number_format($totalPendapatanRaw, 0, ',', '.');
        $totalPengeluaran = 'Rp ' . number_format($totalPengeluaranRaw, 0, ',', '.');
        $selisihBersih = ($selisihBersihRaw < 0 ? '- Rp ' : 'Rp ') . number_format(abs($selisihBersihRaw), 0, ',', '.');

        // Mengitung Target Capaian (Dummy target 50jt/bulan atau disesuaikan)
        // Disini kita tetapkan logika persentase statis bawaan template jika kosong atau dinamis sederhana
        $targetPendapatan = $tipe === 'tahunan' ? 1 : 1;
        $progressPemasukan = $targetPendapatan > 0 ? min(round(($totalPendapatanRaw / $targetPendapatan) * 100), 100) : 0;

        $budgetPengeluaran = $tipe === 'tahunan' ? 1 : 1;
        $progressPengeluaran = $budgetPengeluaran > 0 ? min(round(($totalPengeluaranRaw / $budgetPengeluaran) * 100), 100) : 0;

        return view('admin.laporan', compact(
            'transaksi',
            'totalPendapatan',
            'totalPengeluaran',
            'selisihBersih',
            'periodeAktif',
            'progressPemasukan',
            'progressPengeluaran',
            'transaksiMasukCount',
            'maintenanceCount'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'tanggal' => 'required|date',
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        Pembayaran::create([
            'jenis' => $request->jenis,
            'tanggal_bayar' => $request->tanggal,
            'nama' => $request->nama,
            'nominal' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'status' => 'disetujui', // Otomatis disetujui karena diinput oleh Admin langsung
        ]);

        return redirect()->back()->with('success', 'Transaksi berhasil disimpan!');
    }
}
