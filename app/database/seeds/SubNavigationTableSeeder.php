<?php

class SubNavigationTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('subnavigation')->delete();

		$subnavigation = array(
			array(
					'title' => 'TOOLS',
					'url'  => '/tools',
					'nav_id' => 1
			),
			array(
					'title' => 'FURNITURE',
					'url'  => '/furniture',
					'nav_id' => 1
			),
			array(
					'title' => 'COMPUTERS',
					'url'  => '/computers',
					'nav_id' => 5
			),
			array(
					'title' => 'TV',
					'url'  => '/tv',
					'nav_id' => 5
			),
			array(
					'title' => 'PHONES',
					'url'  => '/phones',
					'nav_id' => 5
			),
			array(
					'title' => 'PAINTINGS',
					'url'  => '/paintings',
					'nav_id' => 4
			),
			array(
					'title' => 'DRAWINGS',
					'url'  => '/drawings',
					'nav_id' => 4
			),
			array(
					'title' => 'PANTS',
					'url'  => '/pants',
					'nav_id' => 2
			),
			array(
					'title' => 'UNDERWEAR',
					'url'  => '/underwear',
					'nav_id' => 2
			),
			array(
					'title' => 'PANTS',
					'url'  => '/pants',
					'nav_id' => 3
			),
			array(
					'title' => 'LINGERIE',
					'url'  => '/lingerie',
					'nav_id' => 3
			),
			array(
					'title' => 'DRESSES',
					'url'  => '/dresses',
					'nav_id' => 3
			),
			array(
					'title' => 'TOYS',
					'url'  => '/toys',
					'nav_id' => 3
			)
		);

		// Uncomment the below to run the seeder
		DB::table('subnavigation')->insert($subnavigation);
	}

}