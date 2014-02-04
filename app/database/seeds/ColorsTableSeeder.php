<?php

class ColorsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('colors')->delete();

        $colors = array(
			array(
			        'title' => 'white',
			        'hex'  => '#fff'
			),
			array(
			        'title' => 'green',
			        'hex'  => '#0f0'
			),
			array(
			        'title' => 'red',
			        'hex'  => '#f00'
			),
			array(
			        'title' => 'blue',
			        'hex'  => '#00f'
			)
        );

        // Uncomment the below to run the seeder
        DB::table('colors')->insert($colors);
    }

}