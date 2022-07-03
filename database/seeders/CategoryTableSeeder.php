<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorys = ['Category 1', 'Category 2', 'Category 3'];

        foreach ($categorys as $key => $category) {

            \App\Models\Category::create([
                'name' => $category,
            ]);
            
        }//end of each

    }//end of run
    
}//end of class