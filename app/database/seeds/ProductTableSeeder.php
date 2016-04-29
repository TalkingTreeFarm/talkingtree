<?php

class ProductTableSeeder extends Seeder
{
        public function run()
        {
            $product = new Product();
            $product->visible = true;
            $product->name = 'Small Basket';
            $product->description = 'Small Basket';
            $product->price = 15;
            $product->amount= 15;
            $product->save();

            $product = new Product();
            $product->visible = true;
            $product->name = 'Large Basket';
            $product->description = 'Large Basket';
            $product->price = 25;
            $product->amount= 10;
            $product->save();

            $product = new Product();
            $product->visible = false;
            $product->name = 'Eggs';
            $product->description = 'Eggs by the dozen';
            $product->price = 10;
            $product->amount= 20;
            $product->save();
        }
}
