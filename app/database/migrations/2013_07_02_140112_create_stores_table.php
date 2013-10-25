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
	        
	        $table->integer('category_id')->unsigned();
	        $table->foreign('category_id')
	        	->references('id')
	        	->on('categories')
	            ->on_delete('restrict')
	            ->on_update('cascade');
	        
	        $table->integer('store_id')->unsigned();
	        $table->foreign('store_id')
	        	->references('id')
	        	->on('stores')
	            ->on_delete('restrict')
	            ->on_update('cascade');
	        
	        $table->integer('user_id')->unsigned();
	        $table->foreign('user_id')
	        	->references('id')
	        	->on('users')
	            ->on_delete('restrict')
	            ->on_update('cascade');
	        
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