<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
            $table->engine ='InnoDB';
            $table->increments('id');
            
            $table->integer('store_id');
            $table->foreign('store_id')->references('id')->on('stores');

            $table->integer('item_id');
            $table->foreign('item_id')->references('id')->on('items');

            $table->string('label');

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
		Schema::drop('categories');
	}
}