<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class BookCategory extends Model
{
    //
    use Notifiable;
    public $table = 'book_category';
    protected $fillable = [
        'nama_kategori'
    ];
    public function allbooks(){
        return $this->hasMany(Book::class,'id_kategori','id');
    }
}
