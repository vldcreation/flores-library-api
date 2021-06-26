<?php

use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pengumuman')->insert([
            "id_user"=> 1,
            "judul"=> "Ada Buku Baru",
            "deskripsi_singkat"=> "Bukunya bagus",
            "deskripsi_panjang"=> "Bukunya bagus sekali",
            "status"=> "Tersedia",
        ]);
    }
}
