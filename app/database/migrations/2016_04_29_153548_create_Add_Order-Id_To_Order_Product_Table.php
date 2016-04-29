<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddOrderIdToOrderProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orderproduct', function($table)
		{
    		$table->integer('order_id')->unsigned();
    		$table->foreign('order_id')->references('id')->on('orders');
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orderproduct', function($table)
		{
    		$table->dropForeign('orderproduct_order_id_foreign');
    		$table->dropColumn('order_id');
		});
	}

}
