<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToBookReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_review', function (Blueprint $table) {
            //
            $table->foreign('id_buku','FK_bookReview_idBuku_from_book')->references('id')
            ->on('book')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('id_user','FK_bookReview_idUser_from_user')->references('id')->on('users')
            ->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_review', function (Blueprint $table) {
            //
            $table->dropForeign(['FK_bookReview_idBuku_from_book','FK_bookReview_idUser_from_user']);
        });
    }
}
