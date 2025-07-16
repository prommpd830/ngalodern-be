<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasil';
    protected $fillable = ['id_user', 'id_mapel', 'id_level', 'id_ujian', 'kelulusan', 'salah', 'benar', 'skor'];

    public function mapel()
    {
    	return $this->belongsTo('App\Mapel', 'id_mapel');
    }

    public function level()
    {
    	return $this->belongsTo('App\Level', 'id_level');
    }

    public function ujian()
    {
    	return $this->belongsTo('App\Tes', 'id_ujian');
    }
}
