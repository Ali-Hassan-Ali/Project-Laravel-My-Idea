<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name'     => 'User',
            'email'    => 'User@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        $user = \App\Models\User::create([
            'name'     => 'User 1',
            'email'    => 'User1@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

        $user = \App\Models\User::create([
            'name'     => 'User 2',
            'email'    => 'User2@gmail.com',
            'password' => bcrypt('123123123'),
        ]);

    }//en of run
    
}//end of class
