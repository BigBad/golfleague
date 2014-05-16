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


		$this->call('CoursesTableSeeder');
		$this->call('PlayersTableSeeder');
		$this->call('SeasonsTableSeeder');
		//$this->call('MatchesTableSeeder');
	}

}