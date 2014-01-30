<?php

class ColorsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('colors')->delete();

		// $color_one = DB::table('colors')
		//     ->select('id')
		//     ->where('label', 'admin')
		//     ->first()
		//     ->id;

		// $color_two = DB::table('colors')
		//     ->select('id')
		//     ->where('label', 'admin')
		//     ->first()
		//     ->id;

		// $color_three = DB::table('colors')
		//     ->select('id')
		//     ->where('label', 'admin')
		//     ->first()
		//     ->id;

        $colors = array(
			array(
			        'label' => 'white',
			        'hex'  => '#fff'
			),
			array(
			        'label' => 'green',
			        'hex'  => '#0f0'
			),
			array(
			        'label' => 'red',
			        'hex'  => '#f00'
			),
			array(
			        'label' => 'blue',
			        'hex'  => '#00f'
			)
        );

        // Uncomment the below to run the seeder
        DB::table('colors')->insert($colors);
    }

}