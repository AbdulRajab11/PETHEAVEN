<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    //protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';

    protected $fillable = [
        'id_user',
        'id_produk',
        'jumlah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
