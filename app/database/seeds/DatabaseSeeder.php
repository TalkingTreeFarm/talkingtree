<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		DB::table('users')->delete();
		DB::table('posts')->delete();
		DB::table('products')->delete();

		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('PostTableSeeder');
		$this->call('ProductTableSeeder');
        $this->call('DeliveryMethodTableSeeder');
	}

}
