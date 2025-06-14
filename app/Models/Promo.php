<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promo';
    protected $fillable = ['kode_promo', 'diskon', 'tanggal_mulai', 'tanggal_selesai', 'syarat'];
}
