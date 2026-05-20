<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 8 Data bawaan yang sesuai persis dengan isi dummy about.blade.php Anda sebelumnya
        $dataGaleri = [
            [
                'image' => 'galeri/2.jpg', // Folder storage/app/public/galeri/
                'title' => 'Kamar Standard',
                'description' => 'Desain minimalis dan fungsional untuk kenyamanan belajar.',
                'status' => 'aktif',
                'sort_order' => 1,
            ],
            [
                'image' => 'galeri/2.jpg',
                'title' => 'Kamar Deluxe AC',
                'description' => 'Fasilitas pendingin ruangan dan kamar mandi dalam premium.',
                'status' => 'aktif',
                'sort_order' => 2,
            ],
            [
                'image' => 'galeri/3.jpg',
                'title' => 'Dapur Bersama',
                'description' => 'Bersih, luas, dan dilengkapi peralatan masak lengkap.',
                'status' => 'aktif',
                'sort_order' => 3,
            ],
            [
                'image' => 'galeri/6.jpg',
                'title' => 'Area Terbuka',
                'description' => 'Area terbuka hijau untuk melepas penat di sore hari.',
                'status' => 'aktif',
                'sort_order' => 4,
            ],
            [
                'image' => 'galeri/5.jpg',
                'title' => 'Area Parkir',
                'description' => 'Sistem parkir kendaraan roda dua yang luas dan aman.',
                'status' => 'aktif',
                'sort_order' => 5,
            ],
            [
                'image' => 'galeri/1.jpg',
                'title' => 'Fas d Bangunan',
                'description' => 'Sentuhan arsitektur bata ekspos yang ikonik dan estetik.',
                'status' => 'aktif',
                'sort_order' => 6,
            ],
            [
                'image' => 'galeri/5.jpg',
                'title' => 'Kamar Premium',
                'description' => 'Pencahayaan alami maksimal dengan jendela besar.',
                'status' => 'aktif',
                'sort_order' => 7,
            ],
            [
                'image' => 'galeri/1.jpg',
                'title' => 'Kumpul Bersama Penghuni Kos',
                'description' => 'Keseruan momentum syukuran menyambut tahun ajaran baru bersama seluruh mahasiswi Kos Rumah Bata.',
                'status' => 'aktif',
                'sort_order' => 8,
            ],
        ];

        foreach ($dataGaleri as $galeri) {
            Galeri::create($galeri);
        }
    }
}