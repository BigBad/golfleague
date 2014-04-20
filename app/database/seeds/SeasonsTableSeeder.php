<?php

class SeasonsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('seasons')->delete();

        Season::create(array('year' => '2013-01-01'));
		Season::create(array('year' => '2014-01-01'));
    }

}