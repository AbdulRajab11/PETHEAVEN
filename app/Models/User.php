<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = ['password', 'remember_token'];

    // Jika Anda menggunakan Laravel 8 atau lebih baru, Anda bisa menambahkan ini
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
