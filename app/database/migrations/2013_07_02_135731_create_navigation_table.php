<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('navigation', function(Blueprint $table)
		{
            $table->engine ='InnoDB';
            
            $table->increments('id');
            $table->string('label');
            $table->string('url');

            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')
            	->references('id')
            	->on('colors')
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
		Schema::drop('navigation');
	}
}