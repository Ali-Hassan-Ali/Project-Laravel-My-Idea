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

            $ideaing = \App\Models\Idea::create([
                'title'          => $idea,
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip consequat',
                'source'         => 'source',
                'category_id'    => 1,
                'user_id'        => 1,
            ]);

            $group = \App\Models\Group::create([
                'name'    => $ideaing->title,
                'idea_id' => $ideaing->id,
                'user_id' => 1,
            ]);

            \App\Models\GroupIdea::create([
                'group_id' => $group->id,
                'user_id'  => 1,
            ]);
            
        }//end of each

    }//end of run
    
}//end of class