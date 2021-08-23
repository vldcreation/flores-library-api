<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notify_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_member');
            $table->string('judul',191);
            $table->string('deskripsi_singkat',191);
            $table->string('slug',255);
            $table->longText('deskripsi_panjang')->nullable();
            $table->timestamps();
        });

        Schema::table('notify_members',function(Blueprint $table){
            $table->foreign('id_admin','FK_notify_members_to_users')->references('id')->on('users')
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
        Schema::dropIfExists('notify_members');
    }
}
