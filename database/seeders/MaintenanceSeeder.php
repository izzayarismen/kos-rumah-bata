<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Maintenance;
use App\Models\User;
use App\Models\Kamar;
use Carbon\Carbon;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user penghuni (bukan admin) secara acak untuk relasi data
        $penghuni = User::where('role', '!=', 'admin')->get();
        
        // Ambil semua kamar yang tersedia
        $kamars = Kamar::all();

        // Jika data user atau kamar belum ada, seeder ini akan melewati pembuatan data
        if ($penghuni->isEmpty() || $kamars->isEmpty()) {
            return;
        }

        // Data dummy maintenance sesuai dengan tampilan pembagian status di view Anda
        $datas = [
            [
                'title' => 'Perbaikan lampu kamar',
                'description' => 'Lampu utama di tengah kamar tiba-tiba mati total dan berkedip sebelum padam.',
                'cost' => 200000,
                'status' => 'waiting',
                'date' => Carbon::create(2026, 6, 1)->toDateString(),
            ],
            [
                'title' => 'Perbaikan AC',
                'description' => 'AC di dalam kamar tidak mengeluarkan hawa dingin sama sekali, hanya angin biasa.',
                'cost' => 500000,
                'status' => 'process',
                'date' => Carbon::create(2026, 6, 12)->toDateString(),
            ],
            [
                'title' => 'Cat ulang kamar',
                'description' => 'Dinding bagian dekat jendela terlihat sedikit lembab dan mengelupas, perlu dicat ulang.',
                'cost' => 800000,
                'status' => 'done',
                'date' => Carbon::create(2026, 5, 5)->toDateString(),
            ],
            [
                'title' => 'Keran air kamar mandi bocor',
                'description' => 'Air terus menetes dari sela-sela keran wastafel meskipun sudah diputar kencang.',
                'cost' => 50000,
                'status' => 'waiting',
                'date' => Carbon::now()->subDays(2)->toDateString(),
            ],
            [
                'title' => 'Pintu lemari pakaian copot',
                'description' => 'Engsel bagian bawah pintu lemari pakaian longgar sehingga pintunya miring dan sulit ditutup.',
                'cost' => 150000,
                'status' => 'process',
                'date' => Carbon::now()->subDays(1)->toDateString(),
            ]
        ];

        foreach ($datas as $index => $data) {
            // Mengambil user dan kamar secara bergantian agar variasinya bagus
            $user = $penghuni[$index % $penghuni->count()];
            $kamar = $kamars[$index % $kamars->count()];

            Maintenance::create([
                'user_id'     => $user->id,
                'kamar_id'    => $kamar->id,
                'title'       => $data['title'],
                'description' => $data['description'],
                'cost'        => $data['cost'],
                'status'      => $data['status'],
                'date'        => $data['date'],
            ]);
        }
    }
}