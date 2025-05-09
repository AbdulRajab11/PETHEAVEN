<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Mengisi tabel user dengan data contoh
        DB::table('user')->insert([
            [
                'nama_lengkap' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password123'), // Enkripsi password
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Contoh No. 1, Jakarta',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Petugas User',
                'email' => 'petugas@example.com',
                'password' => bcrypt('password123'), // Enkripsi password
                'no_hp' => '081234567891',
                'alamat' => 'Jl. Contoh No. 2, Jakarta',
                'role' => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Regular User',
                'email' => 'user@example.com',
                'password' => bcrypt('password123'), // Enkripsi password
                'no_hp' => '081234567892',
                'alamat' => 'Jl. Contoh No. 3, Jakarta',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak data contoh sesuai kebutuhan
        ]);
    }
}
