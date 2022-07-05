<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InspiringStorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inspiringStories = ['storie title 1', 'storie title  2', 'storie title  3'];

        foreach ($inspiringStories as $key => $storie) {

            \App\Models\InspiringStorie::create([
                'title'       => $storie,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip consequat',
                'user_id'     => '1',
            ]);
            
        }//end of each

    }//end of run
    
}//end of class