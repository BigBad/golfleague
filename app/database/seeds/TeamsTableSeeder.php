<?php

class TeamsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('teams')->delete();

        Team::create(array('name' => 'Brown/Bryner'));
        Team::create(array('name' => 'Martin/Homan'));
        Team::create(array('name' => 'Zimmer/Heckman'));
        Team::create(array('name' => 'Linville/Po'));
        Team::create(array('name' => 'Hutter/Watkins'));
        Team::create(array('name' => 'Schmidt/Collins'));
    }

}