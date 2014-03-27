<?php

class PlayersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('players')->delete();

        Player::create(array('name' => 'Michael Schmidt', 'handicap' => ''));
		Player::create(array('name' => 'Michael Hutter', 'handicap' => ''));
		Player::create(array('name' => 'Anthony Brown', 'handicap' => ''));
		Player::create(array('name' => 'Justin Martin', 'handicap' => ''));
		Player::create(array('name' => 'Jay Saldana', 'handicap' => ''));
		Player::create(array('name' => 'Ryan Zimmer', 'handicap' => ''));
		Player::create(array('name' => 'Matthew Pohlabel', 'handicap' => ''));
		Player::create(array('name' => 'Kris Fishbach', 'handicap' => ''));
		Player::create(array('name' => 'Jason Homan', 'handicap' => ''));
		Player::create(array('name' => 'John Tomsic', 'handicap' => ''));
		Player::create(array('name' => 'Derek Watkins', 'handicap' => ''));
		Player::create(array('name' => 'Collins', 'handicap' => ''));
    }

}