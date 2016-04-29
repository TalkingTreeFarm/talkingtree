<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddProducIdToOrderProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('orderproduct', function($table)
		{
    		$table->integer('product_id')->unsigned();
    		$table->foreign('product_id')->references('id')->on('products');
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
    		$table->dropForeign('orderproduct_product_id_foreign');
    		$table->dropColumn('product_id');
		});
	}

}
