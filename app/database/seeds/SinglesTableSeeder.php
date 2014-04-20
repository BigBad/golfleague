<?php

class SinglesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('singles')->delete();

        Single::create(array(
                             'player_1' => '4',
                             'player_2' => '10',
                             'match_id' => '1'
                             ));
        Single::create(array(
                             'player_1' => '8',
                             'player_2' => '9',
                             'match_id' => '1'
                             ));
    }

}