<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users'; 
    protected $fillable = [
        'role','profile','is_active','name', 'email','username','password'
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

    public function _role(){
        return $this->belongsTo(Role::class,'role','id');
    }

    public function _pengumumans(){
        return $this->hasMany(Pengumuman::class,'id_user','id');
    }

    public function _bookReviews(){
        return $this->hasMany(BookReview::class,'id_user','id');
    }

    public function _peminjamans(){
        return $this->hasMany(Peminjaman::class,'id_user','id');
    }

    public function _keranjangs(){
        return $this->hasMany(Keranjang::class,'id_user','id');
    }
}
