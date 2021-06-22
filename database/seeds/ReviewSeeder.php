<?php

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $reviewDummy = array('Bukunya sangat bagus','Hebat','Buku yang sangat menarik');

        foreach($reviewDummy as $data):
            DB::table('book_review')->insert([
                'id_buku' => 1,
                'id_user' => 1,
                'rating' => 4,
                'ulasan' => $data
            ]);
        endforeach;
    }
}
