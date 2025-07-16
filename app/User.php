<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_role', 'id_kategori', 'name', 'email', 'password', 'npm', 'nisn', 'no_telp', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userRole()
    {
        return $this->belongsTo('App\UserRoles', 'id_role');
    }

    public function levelProgress()
    {
        return $this->hasMany('App\LevelProgress', 'id_user');
    }

    public function userKategori()
    {
        return $this->belongsTo('App\UserKategori', 'id_kategori');
    }


}
