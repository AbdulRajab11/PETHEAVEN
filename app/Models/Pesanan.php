<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{

    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_produk',
        'jumlah',
        'alamat_pengiriman',
        'total_harga',
        'status',
    ];
    // Di App\Models\Pesanan.php
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }
}
