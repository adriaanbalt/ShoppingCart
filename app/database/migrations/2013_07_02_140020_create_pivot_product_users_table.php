<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotItemUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_users', function(Blueprint $table)
		{
            $table->engine ='InnoDB';

            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')
            	->references('id')
            	->on('items')
                ->on_delete('restrict')
                ->on_update('cascade');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
            	->references('id')
            	->on('users')
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
		Schema::drop('item_users');
	}
}