<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profiles';
    public function user()
    
{
    return $this->belongsTo(User::class, 'id_user', 'id');
}
public function profile()
{
    return $this->hasOne(\App\Models\Profil::class);
}


}
