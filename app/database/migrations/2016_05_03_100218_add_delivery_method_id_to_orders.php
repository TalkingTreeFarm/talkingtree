<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeliveryMethodIdToOrders extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orders', function($table)
		{
    		$table->integer('delivery_method_id')->unsigned();
    		$table->foreign('delivery_method_id')->references('id')->on('orders');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('orders', function($table)
		{
    		$table->dropForeign('orders_delivery_method_id_foreign');
    		$table->dropColumn('delivery_method_id');
		});
	}

}
