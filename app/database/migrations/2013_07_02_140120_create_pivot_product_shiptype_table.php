<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotProductShiptypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_shiptype', function(Blueprint $table)
		{
            $table->engine ='InnoDB';

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
            	->references('id')
            	->on('products')
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
		Schema::drop('product_shiptype');
	}
}