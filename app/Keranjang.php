<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Keranjang extends Model
{
    //
    use Notifiable;
    public $table = 'keranjang';

    protected $fillable = [
        'id_user','id_buku','status'
    ];
}
