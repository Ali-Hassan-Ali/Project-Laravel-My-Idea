<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = ['post title 1', 'post title 2', 'post title 3'];

        foreach ($posts as $key => $post) {

            \App\Models\Post::create([
                'title'   => $post,
                'body'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip consequat',
                'user_id'        => 1,
            ]);
            
        }//end of each

    }//end of run
    
}//end of class