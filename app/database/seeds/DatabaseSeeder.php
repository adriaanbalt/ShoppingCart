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

		// $this->call('UserTableSeeder');
		// $this->call('ColorsSeeder');
		$this->call('NavigationTableSeeder');
		$this->command->info('Navigation seeded!');

	}

}