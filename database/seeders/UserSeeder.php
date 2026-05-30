<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun Admin Utama
        User::create([
            'nama'            => 'Admin Kos Rumah Bata',
            'email'           => 'admin@gmail.com',
            'role'            => 'admin',
            'password'        => Hash::make('admin123'),
            'no_hp'           => '081234567890',
            'alamat'          => 'Kantor Pengelola Kos Rumah Bata',
        ]);

        // 2. Akun Customer Badzlan
        User::create([
            'nama'            => 'Badzlan Nur Dhabith',
            'email'           => 'badzlandhabith05@gmail.com',
            'role'            => 'customer',
            'password'        => Hash::make('qwertyuiop'),
            'no_hp'           => '082111222333',
            'alamat'          => 'Bogor, Jawa Barat',
        ]);

        // 3. Akun Customer Izza
        User::create([
            'nama'            => 'Izza Yarismen',
            'email'           => 'izzayarismennn@gmail.com',
            'role'            => 'customer',
            'password'        => Hash::make('12345678'),
            'no_hp'           => '0821444555666',
            'alamat'          => 'Jakarta Timur, DKI Jakarta',
        ]);

        // 4. Dummy Customer 1
        User::create([
            'nama'            => 'Faza Muhammad',
            'email'           => 'faza@example.com',
            'role'            => 'customer',
            'password'        => Hash::make('12345678'),
            'no_hp'           => '085711112222',
            'alamat'          => 'Depok, Jawa Barat',
        ]);

        // 5. Dummy Customer 2
        User::create([
            'nama'            => 'Radit Pratama',
            'email'           => 'radit@example.com',
            'role'            => 'customer',
            'password'        => Hash::make('12345678'),
            'no_hp'           => '085733334444',
            'alamat'          => 'Bandung, Jawa Barat',
        ]);

        // 6. Dummy Customer 3
        User::create([
            'nama'            => 'Putra Ramadhan',
            'email'           => 'putra@example.com',
            'role'            => 'customer',
            'password'        => Hash::make('12345678'),
            'no_hp'           => '085755556666',
            'alamat'          => 'Bekasi, Jawa Barat',
        ]);

        // 7. Dummy Customer 4
        User::create([
            'nama'            => 'User Hidayat',
            'email'           => 'user@example.com',
            'role'            => 'customer',
            'password'        => Hash::make('12345678'),
            'no_hp'           => '085777778888',
            'alamat'          => 'Tangerang, Banten',
        ]);
    }
}
