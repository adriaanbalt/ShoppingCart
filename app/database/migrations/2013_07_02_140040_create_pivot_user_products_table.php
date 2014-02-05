<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotUserProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_products', function(Blueprint $table)
		{
            $table->engine ='InnoDB';

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
            	->references('id')
            	->on('users')
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
		Schema::drop('user_products');
	}
}