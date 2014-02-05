<?php

class ZipcodesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('zipcodes')->delete();

		$shiprate = array(
			array(
					'zipcode'  => '10013'
			),
			array(
					'zipcode'  => '10027'
			),
			array(
					'zipcode'  => '10018'
			),
			array(
					'zipcode'  => '10001'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('zipcodes')->insert($shiprate);
	}

}

