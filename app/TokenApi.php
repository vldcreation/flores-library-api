<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenApi extends Model
{
    //
    protected $table = 'token';
    protected $fillable = ['api_key'];
}
