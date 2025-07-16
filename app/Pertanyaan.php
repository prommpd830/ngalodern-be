<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $fillable = ['id_tes', 'nomer', 'pertanyaan', 'a', 'b', 'c', 'd', 'jawaban', 'nilai'];
    
    public function level()
    {
        return $this->belongsTo('App\Level', 'id_level');
    }

    public function materi()
    {
        return $this->belongsTo('App\Materi', 'id_materi');
    }

    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran', 'id_pelajaran');
    }

    public function tes()
    {
        return $this->belongsTo('App\Tes', 'id_tes');
    }
}
