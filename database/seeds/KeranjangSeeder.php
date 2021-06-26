<?php

use Illuminate\Database\Seeder;

class KeranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status = array('Tersedia', 'Kosong');

        foreach($status as $data):
            DB::table('keranjang')->insert([
                'id_user' => 1,
                'id_buku' => 1,
                'status' => $data
            ]);
        endforeach;
    }
}
