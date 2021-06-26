<?php

use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('book')->insert([
            "id_kategori"=> 1,
            "isbn"=> "ISBN222222",
            "judul"=> "Ilmu Theologia",
            "deskripsi"=> "Theologia berasal dari ...",
            "penulis"=> "Theolog",
            "penerbit"=> "Theodora",
            "gambar_buku"=>"Buku1.jpg",
            "jlh_halaman"=> 100,
            "bahasa"=> "Indonesia",
            "edisi"=> "56",
            "tahun_terbit"=> 2019,
            "subject"=> "Fiction",
            "lokasi"=>"Lantai Atas",
        ]);
    }
}
