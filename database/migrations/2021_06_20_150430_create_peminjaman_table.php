<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_buku');
            $table->dateTime('jadwal_pinjam');
            $table->dateTime('jadwal_kembali');
            $table->string('status');
            $table->boolean('is_return')->default(false)->nullable();
            $table->boolean('deadline_1')->default(false)->nullable();
            $table->boolean('deadline_2')->default(false)->nullable();
            $table->boolean('last_deadline')->default(false)->nullable();
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
        Schema::dropIfExists('peminjaman');
    }
}
