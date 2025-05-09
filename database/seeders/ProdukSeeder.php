<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        // Mengisi tabel produk dengan data contoh
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Makanan Kucing',
                'harga' => 50000.00,
                'stok' => 100,
                'deskripsi' => 'Makanan kucing berkualitas tinggi untuk kesehatan optimal.',
                'gambar' => 'makanan_kucing.jpg',
                'id_kategori' => 1, // Pastikan ID ini sesuai dengan ID kategori yang ada
            ],
            [
                'nama_produk' => 'Makanan Anjing',
                'harga' => 60000.00,
                'stok' => 80,
                'deskripsi' => 'Makanan anjing dengan nutrisi lengkap.',
                'gambar' => 'makanan_anjing.jpg',
                'id_kategori' => 1,
            ],
            [
                'nama_produk' => 'Mainan Kucing',
                'harga' => 25000.00,
                'stok' => 150,
                'deskripsi' => 'Mainan interaktif untuk kucing Anda.',
                'gambar' => 'mainan_kucing.jpg',
                'id_kategori' => 4, // Pastikan ID ini sesuai dengan ID kategori yang ada
            ],
            [
                'nama_produk' => 'Kandang Anjing',
                'harga' => 300000.00,
                'stok' => 50,
                'deskripsi' => 'Kandang anjing yang nyaman dan aman.',
                'gambar' => 'kandang_anjing.jpg',
                'id_kategori' => 3,
            ],
            [
                'nama_produk' => 'Aksesori Kucing',
                'harga' => 15000.00,
                'stok' => 200,
                'deskripsi' => 'Aksesori lucu untuk kucing Anda.',
                'gambar' => 'aksesori_kucing.jpg',
                'id_kategori' => 2,
            ],
            // Tambahkan lebih banyak produk sesuai kebutuhan
        ]);
    }
}
