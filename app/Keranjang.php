<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use function PHPUnit\Framework\returnSelf;

class Keranjang extends Model
{
    //
    use Notifiable;
    public $table = 'keranjang';

    protected $fillable = [
        'id_user','id_buku','status'
    ];

    public function _user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function _book(){
        return $this->belongsTo(Book::class,'id_buku','id');
    }
}
