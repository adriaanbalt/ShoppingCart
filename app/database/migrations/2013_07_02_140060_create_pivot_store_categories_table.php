<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotStoreCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_categories', function(Blueprint $table)
		{
            $table->engine ='InnoDB';

            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')
            	->references('id')
            	->on('stores')
                ->on_delete('restrict')
                ->on_update('cascade');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
            	->references('id')
            	->on('storecategories')
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
		Schema::drop('store_categories');
	}
}