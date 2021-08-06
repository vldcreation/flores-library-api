<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    //
    use Notifiable;

    public $table = "role";
    protected $fillable = [
        'role_name'
    ];

    public function _users(){
        return $this->hasMany(User::class,'role','id');
    }

}
