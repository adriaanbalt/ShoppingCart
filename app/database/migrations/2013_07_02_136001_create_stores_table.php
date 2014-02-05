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
			
			$table->string('hash')->unique();
			$table->string('title');
			$table->string('description');
			$table->string('location');
			$table->string('shiptype');
			$table->integer('likes');

			$table->integer('shiprate_id');
			$table->integer('photo_id');
			$table->integer('storecategory_id');
			$table->integer('user_id');

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

/*
id				primary key		unique identifier ie: 283208234

hash			text			letters, numbers, underscores
title			text			visual	BIG RED BICYCLE
average price?	varchar		average of all items in the store
location		varchar		physical location in the world

avg visit/day	number		private to the username owner
photo			varchar		logo
likes_id		foreign key		facebook
followers_id	foreign key		
category id		foreign key		reference CATEGORY
user id			foreign key		reference to user
*/