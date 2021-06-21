<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori');
            $table->string('isbn')->unique();
            $table->string('judul');
            $table->string('sinopsis');
            $table->string('penulis');
            $table->string('penerbit');
            $table->integer('jlh_halaman');
            $table->string('bahasa');
            $table->string('edisi');
            $table->integer('tahun_terbit');
            $table->string('subject');
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
        Schema::dropIfExists('book');
    }
}
