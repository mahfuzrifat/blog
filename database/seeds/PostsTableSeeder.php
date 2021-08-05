<?php

use App\Post; 
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  

        Post::updateOrCreate([
            'user_id' => 1,
            'title' => 'Post One',
            'slug' => 'post_one',
            'image' => 'post1.png',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore doloribus exercitationem vel, dolores, odio maxime minus eum possimus, non aut qui officia incidunt nesciunt tempora ducimus! Sequi, sit porro. Quia odit magnam expedita veritatis temporibus totam molestiae corporis. Nesciunt, pariatur? Ducimus in dolores, earum eaque fugit nisi! Illum ut neque eos commodi culpa omnis quaerat rem voluptas a quibusdam. Eos blanditiis ad obcaecati ducimus, tenetur soluta maxime recusandae autem delectus saepe assumenda eligendi quo nisi debitis at minus eaque aspernatur totam odit error sit quasi libero nemo ex! Eius ex, molestiae consequatur eveniet sunt sint tempore modi nesciunt totam voluptas?',
            'view_count' => 5,
            'p_status' => 1,
            'is_approved' => true
        ]);
 
        Post::updateOrCreate([
            'user_id' => 2,
            'title' => 'Post Two',
            'slug' => 'post_two',
            'image' => 'post2.png',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore doloribus exercitationem vel, dolores, odio maxime minus eum possimus, non aut qui officia incidunt nesciunt tempora ducimus! Sequi, sit porro. Quia odit magnam expedita veritatis temporibus totam molestiae corporis. Nesciunt, pariatur? Ducimus in dolores, earum eaque fugit nisi! Illum ut neque eos commodi culpa omnis quaerat rem voluptas a quibusdam. Eos blanditiis ad obcaecati ducimus, tenetur soluta maxime recusandae autem delectus saepe assumenda eligendi quo nisi debitis at minus eaque aspernatur totam odit error sit quasi libero nemo ex! Eius ex, molestiae consequatur eveniet sunt sint tempore modi nesciunt totam voluptas?',
            'view_count' => 5,
            'p_status' => 1,
            'is_approved' => true
        ]);
    }
}
 