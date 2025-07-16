<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tes extends Model
{
    protected $table = 'tes';
    
    protected $fillable = ['id_bahasa', 'id_level', 'kode_materi', 'id_materi', 'id_mapel', 'tes', 'slug', 'tipe', 'status'];

    public function pertanyaan()
    {
        return $this->hasMany('App\Pertanyaan', 'id_tes')->orderBy('nomer');
    }

    public function skor()
    {
        return $this->hasOne('App\Hasil', 'id_ujian')->orderBy('skor', 'DESC');
    }

    public function level()
    {
        return $this->belongsTo('App\Level', 'id_level');
    }

    public function materi()
    {
        return $this->belongsTo('App\Materi', 'id_materi');
    }
    
    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'id_mapel');
    }

    public function bahasa()
    {
        return $this->belongsTo('App\Bahasa', 'id_bahasa');
    }

    public function Status()
    {
        return $this->belongsTo('App\StatusTes', 'status');
    }
}
