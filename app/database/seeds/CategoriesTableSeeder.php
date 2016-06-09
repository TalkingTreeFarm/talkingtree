<?php


class CategoriesTableSeeder extends Seeder
{
        public function run()
        {
            
            
            $category = new Category();
            $category->name = 'Earthworks';
            $category->save();

            $category = new Category();
            $category->name = 'Animals';
            $category->save();

            $category = new Category();
            $category->name = 'Composting';
            $category->save();

            $category = new Category();
            $category->name = 'Appropriate Technology';
            $category->save();

            $category = new Category();
            $category->name = 'Other';
            $category->save();
        }
}