<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifyMember extends Model
{
    //
    protected $table = 'notify_member';

    protected $fillable = [
        'id_member',
        'judul',
        'deskripsi_singkat',
        'slug',
    ];

    public function _member(){
        return $this->belongsTo(User::class,'id_member','id');
    }
}
