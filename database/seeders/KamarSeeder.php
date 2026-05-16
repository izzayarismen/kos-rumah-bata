<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kamars = [
            [
                'nomor_kamar' => '01',
                'tower'       => 'Ganjil',
                'tipe_kamar'  => 'non-ac',
                'harga'       => 8400000,
                'luas'        => '3 × 3 meter',
                'fasilitas'   => ['Kasur', 'Lemari', 'KM Dalam'],
                'deskripsi'   => 'Kamar Non-AC yang ekonomis dan nyaman, berlokasi di tower ganjil khusus ketenangan.', // <-- TAMBAHKAN
                'status'      => 'tersedia',
                'foto'        => null, // Set null atau ganti dengan path jika ada file lokal
            ],
            [
                'nomor_kamar' => '02',
                'tower'       => 'Genap',
                'tipe_kamar'  => 'ac',
                'harga'       => 13800000,
                'luas'        => '3 × 3 meter',
                'fasilitas'   => ['Kasur', 'Lemari', 'KM Dalam', 'AC'],
                'deskripsi'   => 'Kamar tipe AC dengan sirkulasi udara yang baik dan fasilitas pendukung purna lengkap.', // <-- TAMBAHKAN
                'status'      => 'tersedia',
                'foto'        => null,
            ],
            [
                'nomor_kamar' => '03',
                'tower'       => 'Ganjil',
                'tipe_kamar'  => 'non-ac',
                'harga'       => 8400000,
                'luas'        => '3 × 3 meter',
                'fasilitas'   => ['Kasur', 'Lemari', 'KM Dalam'],
                'deskripsi'   => 'Kamar Non-AC yang ekonomis dan nyaman, berlokasi di tower ganjil khusus ketenangan.', // <-- TAMBAHKAN
                'status'      => 'penuh',
                'foto'        => null,
            ],
            [
                'nomor_kamar' => '04',
                'tower'       => 'Genap',
                'tipe_kamar'  => 'ac',
                'harga'       => 13800000,
                'luas'        => '3 × 3 meter',
                'fasilitas'   => ['Kasur', 'Lemari', 'KM Dalam', 'AC'],
                'deskripsi'   => 'Kamar tipe AC dengan sirkulasi udara yang baik dan fasilitas pendukung purna lengkap.', // <-- TAMBAHKAN
                'status'      => 'tersedia',
                'foto'        => null,
            ],
            [
                'nomor_kamar' => '05',
                'tower'       => 'Ganjil',
                'tipe_kamar'  => 'non-ac',
                'harga'       => 8400000,
                'luas'        => '3 × 3 meter',
                'fasilitas'   => ['Kasur', 'Lemari', 'KM Dalam'],
                'deskripsi'   => 'Kamar Non-AC yang ekonomis dan nyaman, berlokasi di tower ganjil khusus ketenangan.', // <-- TAMBAHKAN
                'status'      => 'tersedia',
                'foto'        => null,
            ],
            [
                'nomor_kamar' => '06',
                'tower'       => 'Genap',
                'tipe_kamar'  => 'ac',
                'harga'       => 13800000,
                'luas'        => '3 × 3 meter',
                'fasilitas'   => ['Kasur', 'Lemari', 'KM Dalam', 'AC'],
                'deskripsi'   => 'Kamar tipe AC dengan sirkulasi udara yang baik dan fasilitas pendukung purna lengkap.', // <-- TAMBAHKAN
                'status'      => 'penuh',
                'foto'        => null,
            ],
        ];

        foreach ($kamars as $kamar) {
            Kamar::create($kamar);
        }
    }
}
