<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
            $table->engine ='InnoDB';
            $table->increments('id');
            
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('store_id');
            $table->foreign('store_id')->references('id')->on('stores');

            $table->integer('item_id');
            $table->foreign('item_id')->references('id')->on('items');

            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('status_id');
            $table->foreign('status_id')->references('id')->on('order_status');
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
		Schema::drop('orders');
	}
}