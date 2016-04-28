<?php
class PostTableSeeder extends Seeder
{
    public function run()
    {
        $post1 = new Post();
        $post1->title = "Seeded Post 1";
        $post1->body = "This comes from the seed!";
        $post1->description = "Some more text!";
        $post1->image = "http://www.fillmurray.com/300/300";
        $post1->user_id = User::first()->id;
        $post1->save();

        $post2 = new Post();
        $post2->title = "Seeded Post 2";
        $post2->body = "This comes from the seed!";
        $post2->description = "Some more text!";
        $post2->image = "http://www.fillmurray.com/300/300";
        $post2->user_id = User::first()->id;
        $post2->save();

        $post3 = new Post();
        $post3->title = "Seeded Post 3";
        $post3->body = "This, too comes from the seed!";
        $post3->description = "Some more text!";
        $post3->image = "http://www.fillmurray.com/300/300";
        $post3->user_id = User::first()->id;
        $post3->save();
    }
}
