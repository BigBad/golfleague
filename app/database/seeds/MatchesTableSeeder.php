<?php

class MatchesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('matches')->delete();

        Match::create(array(
                             'date' => '2014-04-23',
                             'course_id' => '1',
                             'season_id' => '1'
                             ));
    }

}