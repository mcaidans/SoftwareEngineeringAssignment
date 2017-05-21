<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	public function up()
	{
		Schema::create('customers', function($table) {
			$table->increments('id');
			$table->string('phoneNo');
			$table->string('address');
			$table->string('name');
			$table->integer('cardNo');
			$table->integer('secCode');
			$table->string('cardName');
			$table->string('expDate');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('customers');
	}

}
