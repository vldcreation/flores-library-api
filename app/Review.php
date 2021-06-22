<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Review extends Model
{
    //
    use Notifiable;
    public $table = 'book_review';

    protected $fillable = [
        'id_buku','id_user','rating','ulasan'
    ];
}
