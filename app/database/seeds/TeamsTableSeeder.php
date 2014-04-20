<?php

class TeamsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('teams')->delete();

        Team::create(array(
                             'player_1' => '4',
                             'player_2' => '8',
                             'match_id' => '1'
                             ));
        Team::create(array(
                             'player_1' => '10',
                             'player_2' => '9',
                             'match_id' => '1'
                             ));
    }

}