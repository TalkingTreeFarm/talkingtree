<?php

class ProductTableSeeder extends Seeder
{
        public function run()
        {
            $product = new Product();
            $product->name = 'Small_Basket';
            $product->description = 'Small_Basket';
            $product->price = 25;
            $product->amount= 1;
            $product->save();

            $product = new Product();
            $product->name = 'Large_Basket';
            $product->description = 'Large_Basket';
            $product->price = 20;
            $product->amount= 1;
            $product->save();

            $product = new Product();
            $product->name = 'Eggs';
            $product->description = 'Eggs_by_the_dozen';
            $product->price = 20;
            $product->amount= 1;
            $product->save();
        }
}
