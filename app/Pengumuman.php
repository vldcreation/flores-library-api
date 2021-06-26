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
        'id_user', 'judul', 'deskripsi_singkat', 'deskripsi_panjang', 'status'
    ];
}
