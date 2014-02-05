<?php

class StoreCategoriesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('storecategories')->delete();

		$products = array(
			array(
					'category'  => 'clothing'
			),
			array(
					'category'  => 'electronics'
			),
			array(
					'category'  => 'house'
			),
			array(
					'category'  => 'men'
			),
			array(
					'category'  => 'women'
			),
			array(
					'category'  => 'art'
			),
			array(
					'category'  => 'music'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('storecategories')->insert($products);
	}

}
