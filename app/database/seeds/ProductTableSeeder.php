<?php

class ProductTableSeeder extends Seeder
{
        public function run()
        {
            $product = new Product();
            $product->name = 'ProductNameOne';
            $product->description = 'Product Description One';
            $product->price = 25;
            $product->amount= 1;
            $product->save();

            $product = new Product();
            $product->name = 'ProductNameTwo';
            $product->description = 'Product Description Two';
            $product->price = 20;
            $product->amount= 1;
            $product->save();
        }
}
