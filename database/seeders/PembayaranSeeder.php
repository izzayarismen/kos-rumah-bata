<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;
use App\Models\PengajuanSewa;
use Carbon\Carbon;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ==================== TRANSAKSI PEMBAYARAN USER BADZLAN ====================

        // [STATUS 3: APPROVE - FULL DISUBMIT AMAN]
        $sewa1 = PengajuanSewa::find(1);
        if ($sewa1) {
            Pembayaran::create([
                'pengajuan_sewa_id' => $sewa1->id,
                'nominal'           => 14500000,
                'tipe_pembayaran'   => 'full',
                'tanggal_bayar'     => Carbon::now()->subDays(2)->format('Y-m-d'),
                'jenis'             => 'pemasukan',
                'nama'              => 'Pembayaran Sewa ' . $sewa1->order_id,
                'deskripsi'         => 'Pembayaran lunas tahunan dari customer Badzlan.',
                'bukti_transfer'    => '/images/bukti_transfer/1780131932-bukti.jpg',
                'status'            => 'disetujui',
            ]);
        }

        // [STATUS 1: PENDING / MENUNGGU VERIFIKASI]
        $sewa6 = PengajuanSewa::find(6);
        if ($sewa6) {
            Pembayaran::create([
                'pengajuan_sewa_id' => $sewa6->id,
                'nominal'           => 14500000,
                'tipe_pembayaran'   => 'full',
                'tanggal_bayar'     => Carbon::now()->format('Y-m-d'),
                'jenis'             => 'pemasukan',
                'nama'              => 'Pembayaran Sewa ' . $sewa6->order_id,
                'deskripsi'         => 'Bukti pembayaran full sewa kamar kedua Badzlan (Menunggu Verifikasi).',
                'bukti_transfer'    => '/images/bukti_transfer/1780131932-bukti.jpg',
                'status'            => 'pending',
            ]);
        }

        // [STATUS 2: DP APPROVE]
        $sewa7 = PengajuanSewa::find(7);
        if ($sewa7) {
            Pembayaran::create([
                'pengajuan_sewa_id' => $sewa7->id,
                'nominal'           => 7250000, // Setengah harga
                'tipe_pembayaran'   => 'dp',
                'tanggal_bayar'     => Carbon::now()->subDays(3)->format('Y-m-d'),
                'jenis'             => 'pemasukan',
                'nama'              => 'Pembayaran Sewa ' . $sewa7->order_id . ' (DP)',
                'deskripsi'         => 'Transaksi uang muka DP 50% dari Badzlan sudah disetujui admin.',
                'bukti_transfer'    => '/images/bukti_transfer/1780131932-bukti.jpg',
                'status'            => 'disetujui', // Status transaksinya disetujui
            ]);
        }

        // [STATUS 4: UPLOAD ULANG / PEMBAYARAN DITOLAK]
        $sewa8 = PengajuanSewa::find(8);
        if ($sewa8) {
            Pembayaran::create([
                'pengajuan_sewa_id' => $sewa8->id,
                'nominal'           => 14500000,
                'tipe_pembayaran'   => 'full',
                'tanggal_bayar'     => Carbon::now()->subDays(4)->format('Y-m-d'),
                'jenis'             => 'pemasukan',
                'nama'              => 'Pembayaran Sewa ' . $sewa8->order_id,
                'deskripsi'         => 'Ditolak karena gambar bukti transfer buram tidak terbaca.',
                'bukti_transfer'    => '/images/bukti_transfer/1780131932-bukti.jpg',
                'status'            => 'ditolak',
            ]);
        }

        // ==================== TRANSAKSI USER LAIN (TETAP DIPERTAHANKAN) ====================

        // 2. Transaksi untuk Kontrak Izza (ID: 2)
        $sewa2 = PengajuanSewa::find(2);
        if ($sewa2) {
            Pembayaran::create([
                'pengajuan_sewa_id' => $sewa2->id,
                'nominal'           => 6250000,
                'tipe_pembayaran'   => 'dp',
                'tanggal_bayar'     => Carbon::now()->subDays(5)->format('Y-m-d'),
                'jenis'             => 'pemasukan',
                'nama'              => 'Pembayaran Sewa ' . $sewa2->order_id . ' (DP)',
                'deskripsi'         => 'Pembayaran DP awal 50% dari customer Izza.',
                'bukti_transfer'    => '/images/bukti_transfer/sample-dp.png',
                'status'            => 'disetujui',
            ]);

            Pembayaran::create([
                'pengajuan_sewa_id' => $sewa2->id,
                'nominal'           => 6250000,
                'tipe_pembayaran'   => 'pelunasan',
                'tanggal_bayar'     => Carbon::now()->format('Y-m-d'),
                'jenis'             => 'pemasukan',
                'nama'              => 'Pembayaran Sewa ' . $sewa2->order_id . ' (Pelunasan)',
                'deskripsi'         => 'Pelunasan sisa tagihan kos dari customer Izza.',
                'bukti_transfer'    => '/images/bukti_transfer/sample-pelunasan.png',
                'status'            => 'pending',
            ]);
        }

        // 3. Transaksi untuk Kontrak Faza (ID: 3)
        $sewa3 = PengajuanSewa::find(3);
        if ($sewa3) {
            Pembayaran::create([
                'pengajuan_sewa_id' => $sewa3->id,
                'nominal'           => 7250000,
                'tipe_pembayaran'   => 'dp',
                'tanggal_bayar'     => Carbon::now()->format('Y-m-d'),
                'jenis'             => 'pemasukan',
                'nama'              => 'Pembayaran Sewa ' . $sewa3->order_id,
                'deskripsi'         => 'Bukti transfer DP dari customer Faza baru masuk.',
                'bukti_transfer'    => '/images/bukti_transfer/sample-bukti3.png',
                'status'            => 'pending',
            ]);
        }

        // 4. Transaksi untuk Kontrak Radit (ID: 4)
        $sewa4 = PengajuanSewa::find(4);
        if ($sewa4) {
            Pembayaran::create([
                'pengajuan_sewa_id' => $sewa4->id,
                'nominal'           => 12500000,
                'tipe_pembayaran'   => 'full',
                'tanggal_bayar'     => Carbon::now()->subDays(4)->format('Y-m-d'),
                'jenis'             => 'pemasukan',
                'nama'              => 'Pembayaran Sewa ' . $sewa4->order_id,
                'deskripsi'         => 'Ditolak karena nominal transfer di struk berbeda dengan harga asli.',
                'bukti_transfer'    => '/images/bukti_transfer/sample-reject.png',
                'status'            => 'ditolak',
            ]);
        }

        // 5. Transaksi untuk Kontrak Putra (ID: 5)
        $sewa5 = PengajuanSewa::find(5);
        if ($sewa5) {
            Pembayaran::create([
                'pengajuan_sewa_id' => $sewa5->id,
                'nominal'           => 7250000,
                'tipe_pembayaran'   => 'dp',
                'tanggal_bayar'     => Carbon::now()->subWeek()->format('Y-m-d'),
                'jenis'             => 'pemasukan',
                'nama'              => 'Pembayaran Sewa ' . $sewa5->order_id . ' (DP)',
                'deskripsi'         => 'DP Cicilan Pertama Putra.',
                'bukti_transfer'    => '/images/bukti_transfer/putra-dp.png',
                'status'            => 'disetujui',
            ]);

            Pembayaran::create([
                'pengajuan_sewa_id' => $sewa5->id,
                'nominal'           => 7250000,
                'tipe_pembayaran'   => 'pelunasan',
                'tanggal_bayar'     => Carbon::now()->subDay()->format('Y-m-d'),
                'jenis'             => 'pemasukan',
                'nama'              => 'Pembayaran Sewa ' . $sewa5->order_id . ' (Pelunasan)',
                'deskripsi'         => 'Pelunasan sisa sewa Putra.',
                'bukti_transfer'    => '/images/bukti_transfer/putra-lunas.png',
                'status'            => 'disetujui',
            ]);
        }

        // 6. Transaksi Pengeluaran Dummy Mandiri
        Pembayaran::create([
            'pengajuan_sewa_id' => null,
            'nominal'           => 450000,
            'tipe_pembayaran'   => null,
            'tanggal_bayar'     => Carbon::now()->subDays(3)->format('Y-m-d'),
            'jenis'             => 'pengeluaran',
            'nama'              => 'Pembelian Token Listrik Komunal',
            'deskripsi'         => 'Pengeluaran rutin listrik area koridor kos utama.',
            'bukti_transfer'    => null,
            'status'            => 'disetujui',
        ]);
    }
}
