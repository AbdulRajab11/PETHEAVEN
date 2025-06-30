<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PromoSeeder extends Seeder
{
    public function run()
    {
        DB::table('promo')->insert([
            [
                'judul_promo' => 'Diskon 20% Produk Kucing',
                'deskripsi' => 'Diskon untuk semua makanan dan aksesoris kucing.',
                'tanggal_mulai' => Carbon::now(),
                'tanggal_selesai' => Carbon::now()->addDays(10),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'judul_promo' => 'Beli 2 Gratis 1 Mainan',
                'deskripsi' => 'Untuk semua produk mainan hewan.',
                'tanggal_mulai' => Carbon::now(),
                'tanggal_selesai' => Carbon::now()->addDays(7),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
