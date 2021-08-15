<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use Notifiable;
    public $table = "book";
    protected $fillable = [
        'id_kategori', 'barcode', 'isbn', 'judul', 'deskripsi', 'penulis', 'penerbit', 'gambar_buku', 'path_gambar', 'file_buku', 'path_file', 'bahasa', 'edisi', 'tahun_terbit', 'subject', 'lokasi','url','jumlah_buku', 'isAvailable'
    ];
    public function _category(){
        return $this->belongsTo(BookCategory::class,'id_kategori','id');
    }
    public function _peminjamans(){
        return $this->hasMany(Peminjaman::class,'id_buku','id');
    }
    public function _keranjangs(){
        return $this->hasMany(Keranjang::class,'id_buku','id');
    }
}
