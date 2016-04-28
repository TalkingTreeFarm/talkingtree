<?php

class ProductTableSeeder extends Seeder
{
        public function run()
        {


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
        }
}
