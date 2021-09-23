<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_review', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_buku')->unsigned();
            $table->bigInteger('id_user')->unsigned();
<<<<<<< HEAD
            $table->integer('rating');
=======
            $table->double('rating');
>>>>>>> ba8bf103d14645f832164933e2c2b221a27bf6fa
            $table->text('ulasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_book_review');
    }
}
