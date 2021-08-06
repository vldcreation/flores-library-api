<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    //
    protected $table='book_review';
    protected $fillable = [
        'id_buku','id_user','rating','ulasan'
    ];

    public function _user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function _books(){
        return $this->belongsTo(Book::class,'id_buku','id');
    }
}
