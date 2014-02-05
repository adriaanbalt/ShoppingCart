<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotItemStoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_stores', function(Blueprint $table)
		{
            $table->engine ='InnoDB';

            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')
            	->references('id')
            	->on('items')
                ->on_delete('restrict')
                ->on_update('cascade');

            $table->integer('stores_id')->unsigned();
            $table->foreign('stores_id')
            	->references('id')
            	->on('stores')
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
		Schema::drop('item_stores');
	}
}