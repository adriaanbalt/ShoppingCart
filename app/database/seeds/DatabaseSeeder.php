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

		$this->call('ZipcodesTableSeeder');
		$this->command->info('Zipcodes seeded!');
		
		$this->call('ProductCategoriesTableSeeder');
		$this->command->info('Product Categories seeded!');

		$this->call('StoreCategoriesTableSeeder');
		$this->command->info('Store Categories seeded!');

		$this->call('PhotosTableSeeder');
		$this->command->info('Photos seeded!');

		$this->call('ShiprateTableSeeder');
		$this->command->info('Shiprate seeded!');

		$this->call('StoreTableSeeder');
		$this->command->info('Stores seeded!');

		$this->call('ProductTableSeeder');
		$this->command->info('Products seeded!');

		$this->call('ColorsTableSeeder');
		$this->command->info('Colors seeded!');

		$this->call('NavigationTableSeeder');
		$this->command->info('Navigation seeded!');

		$this->call('SubNavigationTableSeeder');
		$this->command->info('SubNavigation seeded!');

	}

}