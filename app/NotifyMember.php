<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifyMember extends Model
{
    //
    protected $table = 'notify_members';

    protected $fillable = [
        'id_user',
        'deskripsi_panjang',
    ];

    public function _member(){
        return $this->belongsTo(User::class,'id_user','id');
    }
}
