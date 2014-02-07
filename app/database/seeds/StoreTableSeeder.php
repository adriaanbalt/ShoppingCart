<?php

class StoreTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('stores')->delete();

		$stores = array(
			array(
					'status' => 'published',
					'hash' => 'store1',
					'title' => 'store 1',
					'description' => 'the first store description is a large but simple group of text',
					'shiptype' => 'pickup',
					'likes' => 6,
					'shiprate_id' => 1,
					'storecategory_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			),
			array(
					'status' => 'published',
					'hash' => 'store2',
					'title' => 'store 2',
					'description' => 'the first store description is a large but simple group of text',
					'shiptype' => 'mail',
					'likes' => 7,
					'shiprate_id' => 1,
					'storecategory_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			),
			array(
					'status' => 'published',
					'hash' => 'store3',
					'title' => 'store 3',
					'description' => 'the first store description is a large but simple group of text',
					'shiptype' => 'pickup',
					'likes' => 8,
					'shiprate_id' => 1,
					'storecategory_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			),
			array(
					'status' => 'published',
					'hash' => 'store4',
					'title' => 'store 4',
					'description' => 'the first store description is a large but simple group of text',
					'shiptype' => 'pickup',
					'likes' => 3,
					'shiprate_id' => 1,
					'storecategory_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			),
			array(
					'status' => 'published',
					'hash' => 'store5',
					'title' => 'store 5',
					'description' => 'the first store description is a large but simple group of text',
					'shiptype' => 'pickup',
					'likes' => 4,
					'shiprate_id' => 1,
					'storecategory_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			),
			array(
					'status' => 'published',
					'hash' => 'store6',
					'title' => 'store 6',
					'description' => 'the first store description is a large but simple group of text',
					'shiptype' => 'pickup',
					'likes' => 5,
					'shiprate_id' => 1,
					'storecategory_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			)
		);

		// Uncomment the below to run the seeder
		DB::table('stores')->insert($stores);
	}

}


/*
	hash
	title
	description
	location
	shiptype
	likes

	shiprate_id
	user_id
	photo_id
	storecategory_id
*/