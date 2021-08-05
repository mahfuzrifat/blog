<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'role_id' => '1',
        	'name' => 'Mr Admin',
        	'user_name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('123456789'),
        ]);

        DB::table('users')->insert([
        	'role_id' => '2',
        	'name' => 'Mr Author',
        	'user_name' => 'author',
        	'email' => 'author@gmail.com',
        	'password' => bcrypt('123456789'),
        ]);
    }
}
