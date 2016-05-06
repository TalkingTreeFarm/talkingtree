<?php

class ProductTableSeeder extends Seeder
{
        public function run()
        {
            $product = new Product();
            $product->visible = true;
            $product->name = 'No Basket';
            $product->description = 'No Basket';
            $product->image = "";
            $product->price = 0;
            $product->amount= 0;
            $product->save();

            $product = new Product();
            $product->visible = true;
            $product->name = 'Small Basket';
            $product->description = 'Small Basket';
            $product->image = "http://lorempixel.com/300/300/food/";
            $product->price = 15;
            $product->amount= 15;
            $product->save();

            $product = new Product();
            $product->visible = true;
            $product->name = 'Large Basket';
            $product->description = 'Large Basket';
            $product->image = "http://lorempixel.com/300/300/food/";
            $product->price = 25;
            $product->amount= 10;
            $product->save();

            $product = new Product();
            $product->visible = false;
            $product->name = 'Eggs';
            $product->description = 'Eggs by the dozen';
            $product->image = "http://lorempixel.com/300/300/food/";
            $product->price = 10;
            $product->amount= 20;
            $product->save();
        }
}
