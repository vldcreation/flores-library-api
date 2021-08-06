<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pengumuman extends Model
{
    //
    use Notifiable;
    public $table = "pengumuman";
    protected $fillable = [
        'id_kategori','id_user', 'judul', 'deskripsi_singkat', 'deskripsi_panjang', 'status'
    ];

    public function _kategori(){
        return $this->belongsTo(KategoriPengumuman::class,'id_kategori','id');
    }

    public function _user(){
        return $this->belongsTo(User::class,'id_user','id');
    }
}
