<?php

use Illuminate\Database\Seeder;

class KategoriPengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kategori_pengumuman')->insert([
            "nama_kategori"=> "New",
        ]);
    }
}
