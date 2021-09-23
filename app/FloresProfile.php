<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FloresProfile extends Model
{
    //
    protected $table = 'flores_profile';

    protected $fillable = [
        'judul',
        'path_image',
        'content'
    ];

}
