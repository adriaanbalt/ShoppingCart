<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stores', function(Blueprint $table)
		{
			$table->engine ='InnoDB';
			
			$table->increments('id');
			
			$table->string('name');
			$table->integer('price');
			$table->integer('quantity');
			$table->string('description');
			$table->boolean('ship')->default(1);
			$table->integer('ship_rate');
			$table->string('hash')->unique();
			
			$table->string('followers')->unique();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}