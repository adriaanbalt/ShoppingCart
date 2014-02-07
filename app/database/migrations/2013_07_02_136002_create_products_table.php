<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->engine ='InnoDB';

			$table->increments('id');

			$table->string('status');
			$table->string('hash')->unique();
			$table->string('title');
			$table->integer('price');
			$table->integer('quantity');
			$table->string('description');
			$table->boolean('shiptype')->default(1);
			$table->integer('likes');

			$table->integer('shiprate_id');
			$table->integer('productcategory_id');
			$table->integer('store_id');
			$table->integer('user_id');
			$table->integer('photo_id');
			
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
		Schema::drop('products');
	}
}