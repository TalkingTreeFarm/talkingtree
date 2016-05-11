<?php
class PostTableSeeder extends Seeder
{
    public function run()
    {
        $post = new Post();
        $post->title = "The main Garden!";
        $post->body = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.

            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.";
        $post->image = "/images/talkingtree6.jpg";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
        
        $post = new Post();
        $post->title = "The harvest is a bountiful one!";
        $post->body = "Take care of the soil and the soil takes care of you. Let us know if you would like to be added to the list of Farm Fresh Families. We have baskets available for pick up every SUNDAY and WEDNESDAY!";
        $post->image = "/images/talkingtree2.jpeg";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();

        $post = new Post();
        $post->title = "Gaston likes muffins!";
        $post->body = "I like to eat English muffins on Monday mornings, and I think you should join me!";
        $post->image = "/images/talkingtree8.jpg";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();

        $post = new Post();
        $post->title = "Mike";
        $post->body = "Iron Mike Tyson, the nightmare!";
        $post->image = "/images/talkingtree4.jpeg";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();

        $post = new Post();
        $post->title = "Gaston is the man!";
        $post->body = "I'm not kidding, really I am NOT!!";
        $post->image = "/images/samplebasket1.jpg";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();

        $post = new Post();
        $post->title = "The people's NITE Market!";
        $post->body = "Be there or be square!!";
        $post->image = "/images/talkingtree9.jpg";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();

        $post = new Post();
        $post->title = "Mother Nature messing with the harvest!!";
        $post->body = "Our Green-house was no match for some good ol Texas Hail!!!";
        $post->image = "/images/talkingtree3.jpeg";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();

        $post = new Post();
        $post->title = "First Harvest of the year!";
        $post->body = "Looking good!";
        $post->image = "/images/talkingtree4.jpeg";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
        $post = new Post();

        $post->title = "Chicks are hatching! YEAH!!";
        $post->body = "**Lorem ipsum dolor sit amet, consectetur adipiscing elit**. 

Vivamus a feugiat tellus. Nunc mi justo, varius id justo sed, finibus euismod augue. Nulla pulvinar lectus nulla, nec vestibulum lorem blandit eu. Phasellus et lectus vitae enim euismod venenatis quis at nisl. Maecenas non mi non lectus sagittis vehicula. Curabitur enim sem, ultricies quis luctus in, ornare vitae sapien. Proin tincidunt, sapien vel lacinia vulputate, turpis quam varius magna, non ornare orci arcu eget urna. Praesent et mauris elementum, consequat tellus vel, commodo ligula. Nullam bibendum enim vel risus semper sagittis. Maecenas eu ornare mi. Sed sed egestas nisi. Proin faucibus interdum nisi, non pellentesque dolor auctor et. Donec cursus neque risus, et malesuada velit congue id. Vestibulum felis nunc, luctus ornare libero eu, accumsan tristique massa. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;

Vestibulum congue consectetur erat, porttitor sollicitudin sem tempus in. Etiam ac vehicula orci. Vivamus et sem neque. Fusce interdum quis nulla id sodales. Aliquam lobortis lacinia facilisis. Vestibulum vel eros vel neque iaculis mattis. Nunc pulvinar luctus nunc nec commodo. Nulla a sem placerat, pellentesque dui sed, condimentum metus. Maecenas vel commodo ex, suscipit porta orci. Nam viverra cursus rutrum. Suspendisse nec lectus eget libero condimentum efficitur vel at velit. Donec ornare aliquam massa nec hendrerit. Maecenas feugiat condimentum mi, ut dictum neque fringilla nec. Ut congue pellentesque feugiat. Vestibulum tempus eget augue id mollis.

Maecenas tortor tortor, aliquet non tempus sed, convallis eget metus. Integer rhoncus nulla at quam commodo, ac dapibus diam hendrerit. Aliquam id ultricies diam, a tristique lorem. Nam vestibulum nisi at tempor sagittis. Donec sed est tempus, hendrerit mauris in, vehicula tortor. Ut consequat ligula nec lacinia tincidunt. Integer accumsan dolor ante, sit amet faucibus libero venenatis eget. Pellentesque convallis suscipit felis. Vivamus convallis justo eu sapien consequat porta. Phasellus vulputate enim ut tincidunt vehicula. Nunc pharetra tellus vel enim ullamcorper cursus. Nullam in ipsum massa.


<iframe width=\"640\" height=\"360\" src=\"https://www.youtube.com/embed/otCpCn0l4Wo\" frameborder=\"0\" allowfullscreen></iframe>





| Column 1 | Column 2 | Column 3 |
| -------- | -------- | -------- |
| John     | Doe      | Male     |
| Mary     | Smith    | Female   |";
        $post->image = "/images/talkingtree5.jpg";
        $post->user_id = User::all()->random()->id;
        $post->category_id = Category::all()->random()->id;
        $post->save();
    }
}
