<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotProductStoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_stores', function(Blueprint $table)
		{
            $table->engine ='InnoDB';

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
            	->references('id')
            	->on('products')
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
		Schema::drop('product_stores');
	}
}