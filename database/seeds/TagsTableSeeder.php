<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::updateOrCreate([
            'name' => 'Bike',
            'slug' => 'bike',
            't_status' => 1
        ]);
        Tag::updateOrCreate([
            'name' => 'Cricket',
            'slug' => 'cricket',
            't_status' => 1
        ]);
        Tag::updateOrCreate([
            'name' => 'Movie',
            'slug' => 'movie',
            't_status' => 1
        ]);
        Tag::updateOrCreate([
            'name' => 'Fashion',
            'slug' => 'fashion',
            't_status' => 1
        ]);
        Tag::updateOrCreate([
            'name' => 'Laravel',
            'slug' => 'laravel',
            't_status' => 1
        ]);
    }
}
