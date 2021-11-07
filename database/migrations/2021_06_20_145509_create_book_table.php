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
            $table->unsignedBigInteger('id_kategori');
            $table->string('barcode',100)->unique();
            $table->string('isbn')->nullable();
            $table->string('judul');
            $table->longText('deskripsi')->nullable();
            $table->string('penulis')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('gambar_buku',255)->nullable();
            $table->string('path_gambar',255)->nullable();
            $table->string('file_buku',255)->nullable();
            $table->string('path_file',255)->nullable();
            $table->string('bahasa')->nullable();
            $table->string('edisi')->nullable();
            $table->integer('tahun_terbit')->nullable();
            $table->string('subject')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('url',255)->nullable();
            $table->boolean('isAvailable')->default(true);
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
