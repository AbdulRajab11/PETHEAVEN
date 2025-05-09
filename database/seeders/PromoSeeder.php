<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoSeeder extends Seeder
{
    public function run()
    {
        // Mengisi tabel promo dengan data contoh
        DB::table('promo')->insert([
            [
                'judul_promo' => 'Diskon 20% untuk Semua Produk',
                'deskripsi' => 'Dapatkan diskon 20% untuk semua produk di toko kami. Berlaku hingga akhir bulan ini.',
                'tanggal_mulai' => now()->toDateString(),
                'tanggal_selesai' => now()->addDays(30)->toDateString(), // 30 hari dari sekarang
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_promo' => 'Beli 1 Gratis 1',
                'deskripsi' => 'Beli satu produk dan dapatkan satu produk gratis. Hanya untuk produk tertentu.',
                'tanggal_mulai' => now()->toDateString(),
                'tanggal_selesai' => now()->addDays(15)->toDateString(), // 15 hari dari sekarang
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul_promo' => 'Promo Spesial Hari Raya',
                'deskripsi' => 'Rayakan hari raya dengan diskon spesial hingga 30% untuk produk tertentu.',
                'tanggal_mulai' => now()->toDateString(),
                'tanggal_selesai' => now()->addDays(10)->toDateString(), // 10 hari dari sekarang
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak promo sesuai kebutuhan
        ]);
    }
}
