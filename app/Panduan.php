<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    protected $table = 'panduan';
    protected $fillable = ['title', 'subtitle', 'image_1', 'image_2', 'image_3', 'konten_title_1', 'konten_title_2', 'konten_title_3', 'konten_subtitle_1', 'konten_subtitle_2', 'konten_subtitle_3'];
}
