<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Level extends Model
{
    protected $table = 'level';
    
    public function userLevel()
    {
        return $this->hasMany('App\User');
    }

    public function userSkor()
    {
        return $this->hasMany('App\Hasil', 'id_level')->orderBy('skor', 'DESC');
    }

    public function materiProgress()
    {
        return $this->hasMany('App\MateriProgress', 'id_level');
    }

    public function materiLevel()
    {
        return $this->hasMany('App\Materi', 'id_level')->where('id_bahasa', 1);
    }
}
