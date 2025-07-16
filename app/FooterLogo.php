<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterLogo extends Model
{
    protected $table = 'footer_logo';
    protected $fillable = ['title', 'logo'];
}
