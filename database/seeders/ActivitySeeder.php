<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'title' => 'Promo Khusus Penghuni Baru Bulan Ini!',
                'description' => 'Dapatkan potongan harga sebesar 10% untuk pembayaran 3 bulan pertama bagi kamu yang memesan kamar tipe Kamar Mandi Dalam di bulan ini. Kuota terbatas, yuk ajukan sewa sekarang!',
                'image' => null, // Bisa diisi nama file gambar jika ada di public/images/activities
                'category' => 'Promo',
                'date' => now()->format('Y-m-d'),
                'is_pinned' => true, // Disematkan di paling atas
                'status' => 'aktif',
                'sort_order' => 1,
            ],
            [
                'title' => 'Fasilitas Wi-Fi Resmi Diupgrade ke 100 Mbps',
                'description' => 'Untuk mendukung kenyamanan belajar dan bekerja dari kos, manajemen Kos Rumah Bata telah melakukan upgrade kapasitas *bandwidth* Wi-Fi di seluruh area koridor dan kamar. Selamat menikmati koneksi yang lebih cepat!',
                'image' => null,
                'category' => 'Update Kos',
                'date' => now()->subDays(2)->format('Y-m-d'),
                'is_pinned' => false,
                'status' => 'aktif',
                'sort_order' => 2,
            ],
            [
                'title' => 'Agenda Buka Puasa Bersama Penghuni Kos',
                'description' => 'Dalam rangka mempererat silaturahmi, kami mengundang seluruh penghuni Kos Rumah Bata untuk hadir dalam acara Buka Puasa Bersama yang akan diadakan di area *rooftop* / ruang komunal pada akhir pekan ini.',
                'image' => null,
                'category' => 'Social',
                'date' => now()->subDays(5)->format('Y-m-d'),
                'is_pinned' => false,
                'status' => 'aktif',
                'sort_order' => 3,
            ],
            [
                'title' => 'Sisa 2 Kamar Kosong untuk Tipe Akomodasi AC',
                'description' => 'Informasi bagi calon penghuni, saat ini ketersediaan kamar dengan fasilitas AC hanya tersisa 2 unit saja di lantai 2. Jangan sampai kehabisan, segera jadwalkan survei atau langsung ajukan sewa.',
                'image' => null,
                'category' => 'Info Kamar',
                'date' => now()->subDays(7)->format('Y-m-d'),
                'is_pinned' => false,
                'status' => 'aktif',
                'sort_order' => 4,
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}