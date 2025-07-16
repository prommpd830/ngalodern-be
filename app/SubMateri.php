<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMateri extends Model
{
     protected $table = 'sub_materi';
     protected $fillable = ['kode_materi', 'id_materi', 'id_bahasa', 'judul', 'konten'];

     public function materi()
     {
     	return $this->belongsTo('App\Materi', 'id_materi');
     }
}
