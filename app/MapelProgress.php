<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapelProgress extends Model
{
    protected $tabel = 'mapel_progress';

    protected $fillable = ['id_user', 'id_mapel', 'id_level'];

    public function mapel()
    {
    	return $this->belongsTo('App\Mapel', 'id_mapel');
    }

    public function level()
    {
    	return $this->belongsTo('App\Level', 'id_level');
    }
}
