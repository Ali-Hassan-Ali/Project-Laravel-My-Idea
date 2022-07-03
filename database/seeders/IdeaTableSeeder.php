<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IdeaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ideas = ['title 1', 'title 2', 'title 3'];

        foreach ($ideas as $key => $idea) {

            \App\Models\Idea::create([
                'title'          => $idea,
                'description'    => 'description description description description description',
                'source'         => 'source',
                'category_id'    => 1,
            ]);
            
        }//end of each

    }//end of run
    
}//end of class