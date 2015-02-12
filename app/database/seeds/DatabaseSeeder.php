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

		$this->call('CoursesTableSeeder');
		$this->call('PlayersTableSeeder');
		$this->call('SeasonsTableSeeder');
		$this->call('HolesTableSeeder');
		$this->call('RoundsTableSeeder');
		$this->call('HolescoresTableSeeder');
		$this->call('LevelsTableSeeder');

		//DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
