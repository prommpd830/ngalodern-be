<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterKontak extends Model
{
    protected $table = 'footer_kontak';
    protected $fillable = ['facebook', 'twitter', 'instagram', 'youtube', 'linkedin'];
}
