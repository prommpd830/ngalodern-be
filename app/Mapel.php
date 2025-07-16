<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Mapel extends Model
{
    protected $table = 'mapel';

    public function mapelProgress()
    {
    	return $this->hasOne('App\MapelProgress', 'id_mapel');
    }

    public function materiProgress()
    {
        return $this->hasMany('App\MateriProgress', 'id_mapel');
    }

    public function materiLevel()
    {
        return $this->hasMany('App\Materi', 'id_mapel')->where('id_bahasa', 1);
    }

    public function userSkor()
    {
    	return $this->hasOne('App\Leaderboard', 'id_mapel')->orderBy('skor', 'DESC');
    }

    public function leaderboard()
    {
    	return $this->hasMany('App\Leaderboard', 'id_mapel')->orderBy('skor', 'DESC');
    }

}
