<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenuitemOrderTable extends Migration {

	public function up()
	{
		Schema::create('menuitem_order', function($table) {
			$table->increments('id');
			$table->integer('order_id');
			$table->integer('menuitem_id');
			$table->integer('quantity');
			$table->decimal('totalPrice');
		});
	}
	
	public function down()
	{
		Schema::drop('orditems');
	}

}
