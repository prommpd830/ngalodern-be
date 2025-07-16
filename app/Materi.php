<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Materi extends Model
{
    protected $table = 'materi';
    protected $fillable = ['kode_materi', 'id_bahasa', 'materi', 'id_mapel', 'id_level'];

    public function subMateri()
    {
        $id_bahasa = session('id_bahasa');
        return $this->hasMany('App\SubMateri', 'kode_materi', 'kode_materi')->where('id_bahasa', $id_bahasa)->orderBy('judul');
    }

    public function progress()
    {
    	return $this->hasOne('App\MateriProgress', 'kode_materi', 'kode_materi')->where('id_user', Auth::user()->id);
    }

    public function level()
    {
        return $this->belongsTo('App\Level', 'id_level');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'id_mapel');
    }

    public function bahasa()
    {
        return $this->belongsTo('App\Bahasa', 'id_bahasa');
    }
}
