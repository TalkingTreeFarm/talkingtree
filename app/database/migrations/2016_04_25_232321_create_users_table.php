<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name', 100);
			$table->string('last_name', 100);
			$table->string('email', 100);
			$table->string('password', 255);
			$table->integer('phone_number')->unsigend();
			$table->string('address');
			$table->integer('zip_code')->unsigned();
			$table->integer('role_id')->unsigned();
			$table->timestamps();
			$table->rememberToken();
            
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
