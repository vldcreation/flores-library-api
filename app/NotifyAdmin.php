<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifyAdmin extends Model
{
    //
    protected $table = 'notify_admin';

    protected $fillable = [
        'id_member',
        'judul',
        'deskripsi_singkat',
        'slug'
    ];

    public function _member(){
        return $this->belongsTo(User::class,'id_member','id');
    }
}
