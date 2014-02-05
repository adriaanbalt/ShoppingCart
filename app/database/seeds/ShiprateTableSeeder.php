<?php

class ShiprateTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('shiprate')->delete();

		$shiprate = array(
			array(
					'state'  => 'ny',
					'country' => 'usa',
					'type' => 'ground',
					'rate' => '10',
					'zipcode_id' => 1
			),
			array(
					'state'  => 'ny',
					'country' => 'usa',
					'type' => 'air',
					'rate' => '100',
					'zipcode_id' => 2
			),
			array(
					'state'  => 'ny',
					'country' => 'usa',
					'type' => 'ground',
					'rate' => '1',
					'zipcode_id' => 3
			)
		);

		// Uncomment the below to run the seeder
		DB::table('shiprate')->insert($shiprate);
	}

}


/*
	state
	country
	type
	rate
	zipcode_id
*/