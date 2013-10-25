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
			        'url'  => '/'
			),
			array(
			        'label' => 'Shop',
			        'url'  => 'shop'
			),
			array(
			        'label' => 'Contact',
			        'url'  => 'contact',
			        'color' => '#fff'
			),
			array(
			        'label' => 'FAQ',
			        'url'  => 'faq',
			        'color' => '#fff'
			)
        );

        // Uncomment the below to run the seeder
        DB::table('navigation')->insert($navigation);
    }

}