<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeranjangSeeder extends Seeder
{
    public function run()
    {
        // Mengisi tabel keranjang dengan data contoh
        DB::table('keranjang')->insert([
            [
                'id_user' => 1, // Pastikan ID ini sesuai dengan ID user yang ada
                'id_produk' => 1, // Pastikan ID ini sesuai dengan ID produk yang ada
                'jumlah' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 1,
                'id_produk' => 2,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 2,
                'id_produk' => 3,
                'jumlah' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 3,
                'id_produk' => 4,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 2,
                'id_produk' => 5,
                'jumlah' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak data keranjang sesuai kebutuhan
        ]);
    }
}
