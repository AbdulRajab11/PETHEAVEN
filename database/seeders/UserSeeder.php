<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('user')->insert([
            [
                'nama_lengkap' => 'Admin Pet Haven',
                'email' => 'admin@pethaven.com',
                'password' => Hash::make('password'),
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Kucing No. 1',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Petugas Gudang',
                'email' => 'petugas@pethaven.com',
                'password' => Hash::make('password'),
                'no_hp' => '081234567891',
                'alamat' => 'Jl. Anjing No. 2',
                'role' => 'petugas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Budi Pembeli',
                'email' => 'user@pethaven.com',
                'password' => Hash::make('password'),
                'no_hp' => '081234567892',
                'alamat' => 'Jl. Sapi No. 3',
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
