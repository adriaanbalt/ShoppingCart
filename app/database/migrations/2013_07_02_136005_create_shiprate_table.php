<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiprateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shiprate', function(Blueprint $table)
		{
			$table->engine ='InnoDB';

			$table->increments('id');
			$table->string('state');
			$table->string('country');
			$table->string('type');
			$table->string('rate');

            $table->integer('zipcode_id')->unsigned();
            $table->foreign('zipcode_id')
            	->references('id')
            	->on('zipcodes')
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
		Schema::drop('shiprate');
	}

}
