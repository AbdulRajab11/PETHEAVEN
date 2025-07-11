<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori'; // Nama tabel
    protected $primaryKey = 'id_kategori'; // Primary key khusus

    protected $fillable = [
        'nama_kategori',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori');
    }
}
