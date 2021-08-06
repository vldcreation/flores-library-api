<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPengumuman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengumuman', function (Blueprint $table) {
            //
            $table->foreign('id_kategori','FK_pengumuman_idKategori_from_kategori')->references('id')->on('kategori_pengumuman')
            ->onUpdate('restrict')->onDelete('restrict');
            $table->foreign('id_user','FK_Pengumuman_idUser_from_user')->references('id')->on('users')
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
        Schema::table('pengumuman', function (Blueprint $table) {
            //
            $table->dropForeign(['FK_pengumuman_idKategori_from_kategori','FK_Pengumuman_idUser_from_user']);
        });
    }
}
