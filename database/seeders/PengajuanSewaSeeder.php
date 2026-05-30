<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PengajuanSewa;
use Carbon\Carbon;

class PengajuanSewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil user berdasarkan email yang telah dibuat di UserSeeder
        $badzlan = User::where('email', 'badzlandhabith05@gmail.com')->first();
        $izza = User::where('email', 'izzayarismennn@gmail.com')->first();
        $faza = User::where('email', 'faza@example.com')->first();
        $fadhil = User::where('email', 'radit@example.com')->first();
        $putra = User::where('email', 'putra@example.com')->first();
        $rian = User::where('email', 'user@example.com')->first();

        // ==================== KONTRAK USER BADZLAN (4 STATUS BERBEDA) ====================

        // [STATUS 3: APPROVE / LUNAS AMAN]
        if ($badzlan) {
            PengajuanSewa::create([
                'id'            => 1,
                'order_id'      => 'KRB-GNP-1001',
                'user_id'       => $badzlan->id,
                'kamar_id'      => 1,
                'tanggal_mulai' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'durasi_sewa'   => 12,
                'catatan'       => 'Minta kamar yang dekat dengan akses Wi-Fi utama.',
                'status'        => 'disetujui',
            ]);

            // [STATUS 1: PENDING / MENUNGGU VERIFIKASI]
            PengajuanSewa::create([
                'id'            => 6,
                'order_id'      => 'KRB-GNP-1006',
                'user_id'       => $badzlan->id,
                'kamar_id'      => 6, // Asumsi ID Kamar 6
                'tanggal_mulai' => Carbon::now()->addDays(12)->format('Y-m-d'),
                'durasi_sewa'   => 12,
                'catatan'       => 'Pengajuan kamar kedua baru diupload.',
                'status'        => 'pending',
            ]);

            // [STATUS 2: DP APPROVE (Kontrak masih pending/proses cicilan, tapi transaksi DP sudah approved)]
            PengajuanSewa::create([
                'id'            => 7,
                'order_id'      => 'KRB-GNP-1007',
                'user_id'       => $badzlan->id,
                'kamar_id'      => 7, // Asumsi ID Kamar 7
                'tanggal_mulai' => Carbon::now()->addDays(15)->format('Y-m-d'),
                'durasi_sewa'   => 12,
                'catatan'       => 'Skema cicilan DP berkala.',
                'status'        => 'pending',
            ]);

            // [STATUS 4: UPLOAD ULANG / PEMBAYARAN DITOLAK]
            PengajuanSewa::create([
                'id'            => 8,
                'order_id'      => 'KRB-GNP-1008',
                'user_id'       => $badzlan->id,
                'kamar_id'      => 8, // Asumsi ID Kamar 8
                'tanggal_mulai' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'durasi_sewa'   => 6,
                'catatan'       => 'Mencoba mengajukan sewa bulanan singkat.',
                'status'        => 'ditolak',
            ]);
        }

        // ==================== KONTRAK USER LAIN (TETAP DIPERTAHANKAN) ====================

        // 2. Pengajuan Izza (Status: pending)
        if ($izza) {
            PengajuanSewa::create([
                'id'            => 2,
                'order_id'      => 'KRB-GJL-2002',
                'user_id'       => $izza->id,
                'kamar_id'      => 2,
                'tanggal_mulai' => Carbon::now()->addDays(7)->format('Y-m-d'),
                'durasi_sewa'   => 12,
                'catatan'       => 'Membawa kendaraan roda dua.',
                'status'        => 'pending',
            ]);
        }

        // 3. Pengajuan Faza (Status: pending)
        if ($faza) {
            PengajuanSewa::create([
                'id'            => 3,
                'order_id'      => 'KRB-GNP-3003',
                'user_id'       => $faza->id,
                'kamar_id'      => 3,
                'tanggal_mulai' => Carbon::now()->addDays(10)->format('Y-m-d'),
                'durasi_sewa'   => 12,
                'catatan'       => null,
                'status'        => 'pending',
            ]);
        }

        // 4. Pengajuan Fadhil (Status: ditolak)
        if ($fadhil) {
            PengajuanSewa::create([
                'id'            => 4,
                'order_id'      => 'KRB-GJL-4004',
                'user_id'       => $fadhil->id,
                'kamar_id'      => 4,
                'tanggal_mulai' => Carbon::now()->addDays(3)->format('Y-m-d'),
                'durasi_sewa'   => 6,
                'catatan'       => 'Pindahan dari kosan lama.',
                'status'        => 'ditolak',
            ]);
        }

        // 5. Pengajuan Putra (Status: disetujui)
        if ($putra) {
            PengajuanSewa::create([
                'id'            => 5,
                'order_id'      => 'KRB-GNP-5005',
                'user_id'       => $putra->id,
                'kamar_id'      => 5,
                'tanggal_mulai' => Carbon::now()->addDays(14)->format('Y-m-d'),
                'durasi_sewa'   => 12,
                'catatan'       => null,
                'status'        => 'disetujui',
            ]);
        }
    }
}
