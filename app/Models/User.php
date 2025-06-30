<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user'; // Nama tabel kustom

    protected $primaryKey = 'id_user'; // Primary key kustom

    protected $fillable = [
        'nama_lengkap', 'email', 'password', 'no_hp', 'alamat', 'role'
    ];

    protected $hidden = [
        'password',
    ];

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_user');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_user');
    }
    public function pesanans()
    {
    return $this->hasMany(Pesanan::class, 'id_user', 'id_user');
    }
    public function profile()
{
    return $this->hasOne(Profil::class, 'id_user', 'id');
}

}
