<?php

class PhotosTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('photos')->delete();

		$shiprate = array(
			array(
					'title' => 'photo1',
					'url' => 'assets/img/photo1.jpg'
			),
			array(
					'title' => 'photo2',
					'url' => 'assets/img/photo2.jpg'
			),
			array(
					'title' => 'photo3',
					'url' => 'assets/img/photo3.jpg'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('photos')->insert($shiprate);
	}

}


/*
	title
	url
*/