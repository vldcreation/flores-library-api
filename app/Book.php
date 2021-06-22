<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    //
    use Notifiable;
    public $table = "book";
    protected $fillable = [
        'id_kategori','isbn','judul','sinopsis','penulis','penerbit','jlh_halaman','bahasa','edisi','tahun_terbit','subject'
    ];
}
