<?php

class NavigationTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('navigation')->delete();

		$navigation = array(
			array(
					'title' => 'HOUSE',
					'url'  => 'house',
					'color_id' => 4
			),
			array(
					'title' => 'CLOTHES',
					'url'  => 'clothes',
					'color_id' => 1
			),
			array(
					'title' => 'ELECTRONICS',
					'url'  => 'electronics',
					'color_id' => 4
			),
			array(
					'title' => 'ART',
					'url'  => 'art',
					'color_id' => 3
			),
			array(
					'title' => 'BOOKS',
					'url'  => 'books',
					'color_id' => 4
			),
			array(
					'title' => 'MUSIC',
					'url'  => 'music',
					'color_id' => 1
			)
		);

		// Uncomment the below to run the seeder
		DB::table('navigation')->insert($navigation);
	}

}