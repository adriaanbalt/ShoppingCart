<?php

class ProductCategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('productcategories')->delete();

		$products = array(
			array(
					'category'  => 'shirt'
			),
			array(
					'category'  => 'pants'
			),
			array(
					'category'  => 'dress'
			),
			array(
					'category'  => 'lingerie'
			),
			array(
					'category'  => 'underwear'
			),
			array(
					'category'  => 'suit'
			),
			array(
					'category'  => 'legging'
			),
			array(
					'category'  => 'hat'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('productcategories')->insert($products);
	}

}

