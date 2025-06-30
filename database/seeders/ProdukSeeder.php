<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Whiskas Tuna 1kg',
                'harga' => 55000,
                'stok' => 100,
                'deskripsi' => 'Makanan kucing rasa tuna berkualitas.',
                // 'gambar' => null,
                'id_kategori' => 1,
                // 'id_promo' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Kandang Besi Lipat',
                'harga' => 250000,
                'stok' => 20,
                'deskripsi' => 'Kandang praktis untuk anjing dan kucing.',
                // 'gambar' => null,
                'id_kategori' => 6,
                // 'id_promo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Mainan Tikus Karet',
                'harga' => 15000,
                'stok' => 60,
                'deskripsi' => 'Mainan lucu untuk kucing bermain.',
                // 'gambar' => null,
                'id_kategori' => 4,
                // 'id_promo' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
