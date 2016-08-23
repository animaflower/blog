<?php

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::all()->each(function ($post) {
            $post->tags()->sync([1]);
        });
    }
}
