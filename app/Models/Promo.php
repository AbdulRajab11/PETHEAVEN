<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = 'promo'; // Nama tabel
    protected $primaryKey = 'id_promo'; // Primary key

    protected $fillable = [
        'judul_promo',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_promo');
    }
}
    