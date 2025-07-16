<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    protected $table = 'latihan';
    
    protected $fillable = ['id_bahasa', 'nomer', 'id_level', 'id_materi', 'id_mapel', 'pertanyaan', 'a', 'b', 'c', 'd', 'jawaban'];

    public function Pertanyaan()
    {
        return $this->hasMany('App\Pertanyaan', 'id_latihan');
    }

    public function Mapel()
    {
    	return $this->belongsTo('App\Mapel', 'id_mapel');
    }
    
    public function Materi()
    {
    	return $this->belongsTo('App\Materi', 'id_materi');
    }

    public function Level()
    {
    	return $this->belongsTo('App\Level', 'id_level');
    }

}
