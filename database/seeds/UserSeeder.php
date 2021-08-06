<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Cur = DB::table('users')->orderBy('id', 'desc')->first();
        if(!$Cur)
            $getId = 'user-0';
        else
            $getId = 'user-'.($Cur->id + 1);
        DB::table('users')->insert([
            'role' => 2,
            'name' => "vicktor desrony",
            'email' => "vicktordesrony@gmail.com",
            'username' => $getId,
            'password' => md5('123456'),
        ]);
    }
}
