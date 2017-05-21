<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function($table) {
			$table->increments('id');
			$table->integer('customer_id');
			$table->string('details');
			$table->boolean('delivery');
			$table->decimal('ordTotal');
			$table->boolean('complete');
			$table->timestamps();
		});
	}


	public function down()
	{
		Schema::drop('orders');
	}

}
