<?php

class PlayersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('players')->delete();

		Player::create(array('id' => '1','name' => 'Michael Schmidt','handicap' => '4.61','created_at' => '2014-05-20 01:13:52','updated_at' => '2014-06-11 01:30:37'));
		Player::create(array('id' => '2','name' => 'Michael Hutter','handicap' => '1.06','created_at' => '2014-05-20 01:13:52','updated_at' => '2014-06-11 01:31:10'));
		Player::create(array('id' => '3','name' => 'Anthony Brown','handicap' => '2.30','created_at' => '2014-05-20 01:13:52','updated_at' => '2014-06-11 01:37:56'));
		Player::create(array('id' => '4','name' => 'Justin Martin','handicap' => '-0.12','created_at' => '2014-05-20 01:13:52','updated_at' => '2014-06-11 01:29:43'));
		Player::create(array('id' => '5','name' => 'Jay Saldana','handicap' => '12.96','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-05-28 02:44:39'));
		Player::create(array('id' => '6','name' => 'Ryan Zimmer','handicap' => '2.93','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-06-11 01:37:34'));
		Player::create(array('id' => '7','name' => 'Matthew Pohlabel','handicap' => '7.01','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-05-20 02:17:45'));
		Player::create(array('id' => '8','name' => 'Kris Fishbach','handicap' => '8.83','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-06-11 01:35:03'));
		Player::create(array('id' => '9','name' => 'Jason Homan','handicap' => '12.00','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-06-11 01:34:09'));
		Player::create(array('id' => '10','name' => 'John Tomsic','handicap' => '4.80','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-06-04 02:46:27'));
		Player::create(array('id' => '11','name' => 'Derek Watkins','handicap' => '9.60','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-06-04 02:49:12'));
		Player::create(array('id' => '12','name' => 'Chris Collins','handicap' => '4.80','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-06-11 01:31:47'));
		Player::create(array('id' => '13','name' => 'Bryan Braswell','handicap' => '8.16','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-05-20 02:22:21'));
		Player::create(array('id' => '14','name' => 'Chris Barker','handicap' => '4.48','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-06-04 02:45:01'));
		Player::create(array('id' => '15','name' => 'Brian Moore','handicap' => '5.28','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-05-20 01:22:54'));
		Player::create(array('id' => '17','name' => 'Caleb','handicap' => '16.80','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-06-11 01:34:41'));
		Player::create(array('id' => '18','name' => 'Nick Metro','handicap' => '9.12','created_at' => '2014-05-20 01:13:53','updated_at' => '2014-06-11 01:36:18'));
		Player::create(array('id' => '19','name' => 'Andy','handicap' => '13.92','created_at' => '2014-05-20 02:18:34','updated_at' => '2014-05-20 02:38:53'));
		Player::create(array('id' => '20','name' => 'Tony','handicap' => '11.04','created_at' => '2014-06-11 01:32:14','updated_at' => '2014-06-11 01:35:43'));
		Player::create(array('id' => '21','name' => 'Sean','handicap' => '10.08','created_at' => '2014-06-11 01:32:23','updated_at' => '2014-06-11 01:36:57'));
		DB::statement('ALTER SEQUENCE players_id_seq RESTART WITH 22;');
    }

}
