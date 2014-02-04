<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ColorsTableSeeder');
		$this->command->info('Colors seeded!');
		$this->call('NavigationTableSeeder');
		$this->command->info('Navigation seeded!');
		$this->call('SubNavigationTableSeeder');
		$this->command->info('SubNavigation seeded!');

	}

}