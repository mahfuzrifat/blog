<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::updateOrCreate([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'photo' => 'default.pnj',
            'c_status' => 1
        ]);
        Category::updateOrCreate([
            'name' => 'Laravel',
            'slug' => 'laravel',
            'photo' => 'default.pnj',
            'c_status' => 1
        ]);
         Category::updateOrCreate([
            'name' => 'Php',
            'slug' => 'php',
            'photo' => 'default.pnj',
            'c_status' => 1
        ]); 
        Category::updateOrCreate([
            'name' => 'JavaScript',
            'slug' => 'javascript',
            'photo' => 'default.pnj',
            'c_status' => 1
        ]);
        Category::updateOrCreate([
            'name' => 'Html',
            'slug' => 'html',
            'photo' => 'default.pnj',
            'c_status' => 1
        ]);
         Category::updateOrCreate([
            'name' => 'Java',
            'slug' => 'java',
            'photo' => 'default.pnj',
            'c_status' => 1
        ]);
    }
}
