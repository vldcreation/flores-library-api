<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BookCategory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(BookCategory::class, function (Faker $faker) {
    return [
        //
        'nama_kategori' => Str::random(10),
    ];
});
