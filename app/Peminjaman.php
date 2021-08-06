<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //
    protected $table = 'peminjaman';
    protected $fillable=[
        'id_user','id_buku','jadwal_pinjam','jadwal_kembali','status'
    ];
    public function _user(){
        $this->belongsTo(User::class,'id_user','id');
    }
    public function _book(){
        return $this->belongsTo(Book::class,'id_buku','id');
    }
}
