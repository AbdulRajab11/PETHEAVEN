<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        // Mengisi tabel kategori dengan data contoh
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'Makanan Hewan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Aksesori Hewan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Kandang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Mainan Hewan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Perawatan Hewan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak kategori sesuai kebutuhan
        ]);
    }
}
