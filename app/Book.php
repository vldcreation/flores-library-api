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
        'id_kategori','isbn','judul','deskrispi','sinopsis','penulis','penerbit','gambar_buku','jlh_halaman','bahasa','edisi','tahun_terbit','subject','lokasi'
    ];
}
