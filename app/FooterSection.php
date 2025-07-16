<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterSection extends Model
{
    protected $table = 'footer_section';
    protected $fillable = ['title', 'deskripsi_1', 'deskripsi_2', 'telepon', 'fax', 'email'];
}
