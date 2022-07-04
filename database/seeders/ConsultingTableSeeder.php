<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConsultingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consultings = ['consulting title 1', 'consulting title 2', 'consulting title 3'];

        foreach ($consultings as $key => $consulting) {

            $consulting = \App\Models\Consulting::create([
                'title'          => $consulting,
                'question'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor',

                'anser'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip consequat',
                'category_id'    => 1,
                'user_id'        => 1,
            ]);
            
        }//end of each

    }//end of run
    
}//end of class