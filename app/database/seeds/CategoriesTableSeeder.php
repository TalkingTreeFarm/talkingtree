<?php


class CategoriesTableSeeder extends Seeder
{
        public function run()
        {
            
            
            $product = new Category();
            $product->name = 'composting';
            $product->save();

            $product = new Category();
            $product->name = 'general farming';
            $product->save();

            $product = new Category();
            $product->name = 'experiments';
            $product->save();
        }
}