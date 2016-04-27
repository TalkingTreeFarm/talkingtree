<?php
class PostTableSeeder extends Seeder
{
    public function run()
    {
        $post = new Post();
        $post->title = "Seeded Post 1";
        $post->body = "This comes from the seed!";
        $post->description = "Some more text!";
        $post->user_id = User::first()->id;
        $post->save();
        $post = new Post();
        $post->title = "Seeded Post 2";
        $post->body = "This comes from the seed!";
        $post->description = "Some more text!";
        $post->user_id = User::first()->id;
        $post->save();
        $post = new Post();
        $post->title = "Seeded Post 3";
        $post->description = "Some more text!";
        $post->body = "This, too comes from the seed!";
        $post->user_id = User::first()->id;
        $post->save();
    }
}