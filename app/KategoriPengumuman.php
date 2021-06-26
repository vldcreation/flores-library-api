<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class KategoriPengumuman extends Model
{
    //
    use Notifiable;
    public $table = "kategori_pengumuman";
    protected $fillable = [
        'nama_kategori'
    ];
}
