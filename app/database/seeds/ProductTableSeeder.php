<?php

class ProductTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('products')->delete();

		$products = array(
			array(
					'status' => 'published',
					'hash' => 'product_1',
					'title' => 'product 1',
					'price' => 100,
					'quantity' => 5,
					'description' => 'the first product description is a large but simple group of text',
					'shiptype' => 'pickup',
					'likes' => 6,
					'shiprate_id' => 1,
					'productcategory_id' => 1,
					'store_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			),
			array(
					'status' => 'published',
					'hash' => 'product_2',
					'title' => 'product 2',
					'price' => 100,
					'quantity' => 3,
					'description' => 'the first product description is a large but simple group of text',
					'shiptype' => 'mail',
					'likes' => 7,
					'shiprate_id' => 1,
					'productcategory_id' => 1,
					'store_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			),
			array(
					'status' => 'published',
					'hash' => 'product_3',
					'title' => 'product 3',
					'price' => 100,
					'quantity' => 1,
					'description' => 'the first product description is a large but simple group of text',
					'shiptype' => 'pickup',
					'likes' => 8,
					'shiprate_id' => 1,
					'productcategory_id' => 1,
					'store_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			),
			array(
					'status' => 'published',
					'hash' => 'product_4',
					'title' => 'product 4',
					'price' => 100,
					'quantity' => 15,
					'description' => 'the first product description is a large but simple group of text',
					'shiptype' => 'pickup',
					'likes' => 3,
					'shiprate_id' => 1,
					'productcategory_id' => 1,
					'store_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			),
			array(
					'status' => 'published',
					'hash' => 'product_5',
					'title' => 'product 5',
					'price' => 100,
					'quantity' => 50,
					'description' => 'the first product description is a large but simple group of text',
					'shiptype' => 'pickup',
					'likes' => 4,
					'shiprate_id' => 1,
					'productcategory_id' => 1,
					'store_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			),
			array(
					'status' => 'published',
					'hash' => 'product_6',
					'title' => 'product 6',
					'price' => 100,
					'quantity' => 7,
					'description' => 'the first product description is a large but sijusmple group of text',
					'shiptype' => 'pickup',
					'likes' => 5,
					'shiprate_id' => 1,
					'productcategory_id' => 1,
					'store_id' => 1,
					'user_id' => 1,
					'photo_id' => 1
			)
		);

		// Uncomment the below to run the seeder
		DB::table('products')->insert($products);
	}

}


/*
	hash
	title
	price
	quantity
	description
	shiptype
	likes

	shiprate_id
	productcategory_id
	store_id
	user_id
	followers
*/