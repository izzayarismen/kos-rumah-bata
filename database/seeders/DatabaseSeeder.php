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
        // Menyisipkan data akun default (jika ada)
        // User::factory(10)->create();

        // Panggil KamarSeeder di sini
        $this->call([
            KamarSeeder::class,
        ]);
    }
}
