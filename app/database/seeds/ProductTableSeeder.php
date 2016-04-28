<?php

class ProductTableSeeder extends Seeder
{
        public function run()
        {
<<<<<<< HEAD


            $product1 = new Product();
            $product1->name = 'ProductNameOne';
            $product1->description = 'Product Description One';
            $product1->price = 25.00;
            $product1->amount= 1;
            $product1->save();

            $product2 = new Product();
            $product2->name = 'ProductNameTwo';
            $product2->description = 'Product Description Two';
            $product2->price = 20.00;
            $product2->amount = 1;
            $product2->save();
=======
            
            
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
>>>>>>> 2442019acd6012b3c6c4e37c083af6cde506d8f1
        }
}
