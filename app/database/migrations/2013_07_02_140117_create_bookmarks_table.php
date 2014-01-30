<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookmarks', function(Blueprint $table)
		{
	        $table->engine ='InnoDB';
			
			$table->integer('store_id')->unsigned();
			$table->foreign('store_id')
				->references('id')
				->on('stores')
	            ->on_delete('restrict')
	            ->on_update('cascade');
			
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
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
		Schema::drop('bookmarks');
	}

}