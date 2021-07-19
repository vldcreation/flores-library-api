<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'role_name'
    ];

    public $table = "role";
}
