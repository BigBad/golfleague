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
		//DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		Round::flushEventListeners(); //Prevent events from firing during seeding

		$this->call('CoursesTableSeeder');
		$this->call('HolesTableSeeder');
		$this->call('PlayersTableSeeder');
		$this->call('LevelsTableSeeder');
		$this->call('RoundsTableSeeder');
		$this->call('HolescoresTableSeeder');


		//DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
