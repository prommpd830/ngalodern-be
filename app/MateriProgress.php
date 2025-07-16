<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriProgress extends Model
{
    protected $table = 'materi_progress';
    protected $fillable = ['id_mapel', 'kode_materi', 'id_user', 'id_level'];
}
