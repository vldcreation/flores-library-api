<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array('admin','pengurus','pengguna');
        foreach($data as $role):
            DB::table('role')->insert([
                'role_name' => $role,
                'created_at' => date("Y-m-d h:i:s", time())
            ]);   
        endforeach;
    }
}
