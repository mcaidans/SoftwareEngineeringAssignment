<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemTable extends Migration {

	public function up()
	{
		Schema::create('menuitems', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('details');
			$table->decimal('price');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('menuitems');
	}

}
