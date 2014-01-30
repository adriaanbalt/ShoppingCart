<?php

class NavigationTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('navigation')->delete();

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

        $navigation = array(
			array(
			        'label' => 'Home',
			        'url'  => '/',
			        'color_id' => 1
			),
			array(
			        'label' => 'Shop',
			        'url'  => '/shop',
			        'color_id' => 2
			),
			array(
			        'label' => 'Contact',
			        'url'  => '/contact',
			        'color_id' => 3
			),
			array(
			        'label' => 'FAQ',
			        'url'  => '/faq',
			        'color_id' => 4
			)
        );

        // Uncomment the below to run the seeder
        DB::table('navigation')->insert($navigation);
    }

}