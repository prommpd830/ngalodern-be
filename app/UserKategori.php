<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserKategori extends Model
{
    protected $table = 'user_kategori';
    
    protected $fillable = ['kategori'];

    public function usersKategori()
    {
        return $this->hasMany('App\User');
    }
}
