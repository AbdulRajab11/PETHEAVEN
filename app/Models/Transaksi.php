<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_user',
        'id_petugas',
        'tanggal',
        'total_harga',
        'status',
        'metode_pembayaran',
        'alamat_pengiriman',
        'catatan',
    ];

    // Relasi ke user yang melakukan transaksi

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_transaksi', 'id_transaksi');
    }


    // public function petugas()
    // {
    //     return $this->belongsTo(User::class, 'id_petugas', 'id_user');
    // }

    // Nanti kita tambahkan relasi ke detail_transaksi jika ada
}
