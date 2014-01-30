<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotOrdersTable extends Migration {

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
            
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
            	->references('id')
            	->on('itemcategories')
                ->on_delete('restrict')
                ->on_update('cascade');

            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')
            	->references('id')
            	->on('stores')
                ->on_delete('restrict')
                ->on_update('cascade');

            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')
            	->references('id')
            	->on('items')
                ->on_delete('restrict')
                ->on_update('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
            	->references('id')
            	->on('users')
                ->on_delete('restrict')
                ->on_update('cascade');

            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')
            	->references('id')
            	->on('order_status')
                ->on_delete('restrict')
                ->on_update('cascade');
            
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