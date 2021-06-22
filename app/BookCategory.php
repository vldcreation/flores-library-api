<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class BookCategory extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'nama_kategori'
    ];
}
