<?php
class PostTableSeeder extends Seeder
{
    public function run()
    {
        $post = new Post();
        $post->title = "Seeded Post 1";
        $post->body = "This comes from the seed!";
        $post->image = "http://www.fillmurray.com/300/300";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
        $post = new Post();
        $post->title = "Seeded Post 2";
        $post->body = "This comes from the seed!";
        $post->image = "http://www.fillmurray.com/300/300";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
        $post = new Post();
        $post->title = "Seeded Post 3";
        $post->body = "This, too comes from the seed!";
        $post->image = "http://www.fillmurray.com/300/300";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
        $post = new Post();
        $post->title = "Seeded Post 4";
        $post->body = "This, too comes from the seed!";
        $post->image = "http://www.fillmurray.com/300/300";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
        $post = new Post();
        $post->title = "Seeded Post 5";
        $post->body = "This, too comes from the seed!";
        $post->image = "http://www.fillmurray.com/300/300";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
        $post = new Post();
        $post->title = "Seeded Post 6";
        $post->body = "This, too comes from the seed!";
        $post->image = "http://www.fillmurray.com/300/300";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
        $post = new Post();
        $post->title = "Seeded Post 7";
        $post->body = "This, too comes from the seed!";
        $post->image = "http://www.fillmurray.com/300/300";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
        $post = new Post();
        $post->title = "Seeded Post 8";
        $post->body = "This, too comes from the seed!";
        $post->image = "http://www.fillmurray.com/300/300";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
        $post = new Post();
        $post->title = "Seeded Post 9";
        $post->body = "This, too comes from the seed!";
        $post->image = "http://www.fillmurray.com/300/300";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
    }
}
