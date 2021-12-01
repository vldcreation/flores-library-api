<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Book::class, function (Faker $faker) {
    $arrIdCat = App\BookCategory::pluck('id')->toArray();
    $lastBarcode = DB::table('book')->orderBy('id','desc')->pluck('id')->first();
    return [
        //
        'id_kategori' => array_rand($arrIdCat,1),
        'barcode' => 'book.if3190'.strval(intval($lastBarcode) + 1),
        'ISBN' => 'ISBN-BI-'.strval(intval($lastBarcode) + 1),
        'Judul' => $faker->title
    ];
});
