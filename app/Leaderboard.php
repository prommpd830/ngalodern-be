<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    protected $fillable = ['id_user', 'user', 'id_mapel', 'id_level', 'level', 'skor'];
    
    public function Level()
    {
    	return $this->belongsTo('App\Level', 'id_level');
    }
    
}
