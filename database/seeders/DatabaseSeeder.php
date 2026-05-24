<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KamarSeeder::class, // Seeder yang sudah ada sebelumnya
            FaqSeeder::class,   // Tambahkan ini
            ActivitySeeder::class,
            GaleriSeeder::class,
        ]);
    }
}
