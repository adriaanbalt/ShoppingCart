<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubnavigationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subnavigation', function(Blueprint $table)
		{
            $table->engine ='InnoDB';
            $table->increments('id');
            $table->string('label');
            $table->string('url');
            $table->integer('nav_id')->unsigned();
            $table->foreign('nav_id')
            	->references('id')
            	->on('navigation')
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
		Schema::drop('subnavigation');
	}
}