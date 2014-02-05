<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotStoreShiptypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_shiptype', function(Blueprint $table)
		{
            $table->engine ='InnoDB';

            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')
            	->references('id')
            	->on('stores')
                ->on_delete('restrict')
                ->on_update('cascade');

            $table->integer('shiptype_id')->unsigned();
            $table->foreign('shiptype_id')
            	->references('id')
            	->on('shiptype')
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
		Schema::drop('store_shiptype');
	}
}