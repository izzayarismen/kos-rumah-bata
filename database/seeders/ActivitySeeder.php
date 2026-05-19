<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $activities = [
            [
                'title' => 'Acara Buka Bersama',
                'description' => 'Kegiatan rutin buka puasa bersama yang diadakan setiap bulan suci Ramadhan untuk mempererat silaturahmi antar penghuni kos.',
                'image' => 'bukber.jpg',
                'status' => 'aktif',
                'sort_order' => 1,
            ],
            [
                'title' => 'Olahraga Akhir Pekan',
                'description' => 'Kegiatan olahraga pagi atau senam bersama di area parkir kos Rumah Bata setiap hari Minggu pagi.',
                'image' => 'olahraga.jpg',
                'status' => 'aktif',
                'sort_order' => 2,
            ],
        ];

        foreach ($activities as $activity) {
            Activity::create($activity);
        }
    }
}