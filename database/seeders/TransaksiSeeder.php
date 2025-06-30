<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransaksiSeeder extends Seeder
{

    public function run()
    {
        DB::table('transaksi')->insert([
            [
                'id_user' => 3,
                'id_petugas' => 2,
                'tanggal' => Carbon::now(),
                'total_harga' => 125000,
                'status' => 'Diproses',
                'metode_pembayaran' => 'Transfer',
                'alamat_pengiriman' => 'Jl. Sapi No. 3',
                'catatan' => 'Harap dikirim sore hari.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
