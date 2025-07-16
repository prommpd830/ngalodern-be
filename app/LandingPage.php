<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $table = 'landing_page';
    protected $fillable = ['logo', 'title', 'header', 'video_1', 'video_2', 'video_3'];
}
