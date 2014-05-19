<?php

class PlayersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('players')->delete();

        Player::create(array('name' => 'Michael Schmidt', 'handicap' => '4'));
		Player::create(array('name' => 'Michael Hutter', 'handicap' => '4'));
		Player::create(array('name' => 'Anthony Brown', 'handicap' => '3'));
		Player::create(array('name' => 'Justin Martin', 'handicap' => '3'));
		Player::create(array('name' => 'Jay Saldana', 'handicap' => '17'));
		Player::create(array('name' => 'Ryan Zimmer', 'handicap' => '5'));
		Player::create(array('name' => 'Matthew Pohlabel', 'handicap' => '9'));
		Player::create(array('name' => 'Kris Fishbach', 'handicap' => '12'));
		Player::create(array('name' => 'Jason Homan', 'handicap' => '8'));
		Player::create(array('name' => 'John Tomsic', 'handicap' => '8'));
		Player::create(array('name' => 'Derek Watkins', 'handicap' => '8'));
		Player::create(array('name' => 'Chris Collins', 'handicap' => '8'));
		Player::create(array('name' => 'Bryan Braswell', 'handicap' => '8'));
		Player::create(array('name' => 'Chris Barker', 'handicap' => '4'));
		Player::create(array('name' => 'Brian Moore', 'handicap' => '5'));
		Player::create(array('name' => 'Dainon', 'handicap' => '0'));
		Player::create(array('name' => 'Caleb', 'handicap' => '0'));
		Player::create(array('name' => 'Nick Metro', 'handicap' => '0'));
		
    }

}