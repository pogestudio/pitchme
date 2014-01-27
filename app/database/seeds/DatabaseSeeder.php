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

		$this->call('PitchesTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('WinnersTableSeeder');
		$this->call('RatingsTableSeeder');
		$this->call('PaymentsTableSeeder');
		$this->call('SettingsTableSeeder');
	}

}