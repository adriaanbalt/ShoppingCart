<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotStoreProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_products', function(Blueprint $table)
		{
            $table->engine ='InnoDB';

            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')
            	->references('id')
            	->on('stores')
                ->on_delete('restrict')
                ->on_update('cascade');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
            	->references('id')
            	->on('products')
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
		Schema::drop('store_products');
	}
}