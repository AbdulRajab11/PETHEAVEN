<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategori')->insert([
            ['nama_kategori' => 'Makanan Kucing'],
            ['nama_kategori' => 'Makanan Anjing'],
            ['nama_kategori' => 'Aksesoris'],
            ['nama_kategori' => 'Mainan'],
            ['nama_kategori' => 'Perawatan'],
            ['nama_kategori' => 'Kandang'],
        ]);
    }
}
