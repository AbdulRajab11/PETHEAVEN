<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        // Mengisi tabel transaksi dengan data contoh
        DB::table('transaksi')->insert([
            [
                'id_user' => 1, // Pastikan ID ini sesuai dengan ID user yang ada
                'id_petugas' => 1, // Pastikan ID ini sesuai dengan ID petugas yang ada
                'tanggal' => now(),
                'total_harga' => 250000.00,
                'status' => 'Menunggu Pembayaran',
                'metode_pembayaran' => 'Transfer',
                'alamat_pengiriman' => 'Jl. Contoh No. 1, Jakarta',
                'catatan' => 'Segera kirim, terima kasih.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 2,
                'id_petugas' => null, // Petugas bisa null
                'tanggal' => now(),
                'total_harga' => 150000.00,
                'status' => 'Diproses',
                'metode_pembayaran' => 'COD',
                'alamat_pengiriman' => 'Jl. Contoh No. 2, Jakarta',
                'catatan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 3,
                'id_petugas' => 1,
                'tanggal' => now(),
                'total_harga' => 500000.00,
                'status' => 'Dikirim',
                'metode_pembayaran' => 'QRIS',
                'alamat_pengiriman' => 'Jl. Contoh No. 3, Jakarta',
                'catatan' => 'Harap kirim sebelum sore.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak transaksi sesuai kebutuhan
        ]);
    }
}
