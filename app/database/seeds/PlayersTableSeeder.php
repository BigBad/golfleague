<?php

class PlayersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('players')->delete();

        Player::create(array('name' => 'Michael Schmidt', 'handicap' => '3.17'));
		Player::create(array('name' => 'Michael Hutter', 'handicap' => '0.86'));
		Player::create(array('name' => 'Anthony Brown', 'handicap' => '1.68'));
		Player::create(array('name' => 'Justin Martin', 'handicap' => '-0.96'));
		Player::create(array('name' => 'Jay Saldana', 'handicap' => '13.20'));
		Player::create(array('name' => 'Ryan Zimmer', 'handicap' => '2.16'));
		Player::create(array('name' => 'Matthew Pohlabel', 'handicap' => '7.01'));
		Player::create(array('name' => 'Kris Fishbach', 'handicap' => '8.54'));
		Player::create(array('name' => 'Jason Homan', 'handicap' => '8'));
		Player::create(array('name' => 'John Tomsic', 'handicap' => '8'));
		Player::create(array('name' => 'Derek Watkins', 'handicap' => '8'));
		Player::create(array('name' => 'Chris Collins', 'handicap' => '5.09'));
		Player::create(array('name' => 'Bryan Braswell', 'handicap' => '8.16'));
		Player::create(array('name' => 'Chris Barker', 'handicap' => '4.32'));
		Player::create(array('name' => 'Brian Moore', 'handicap' => '5.28'));
		Player::create(array('name' => 'Dainon', 'handicap' => '0'));
		Player::create(array('name' => 'Caleb', 'handicap' => '0'));
		Player::create(array('name' => 'Nick Metro', 'handicap' => '0'));
		Player::create(array('name' => 'Andy', 'handicap' => '0'));
		
    }

}