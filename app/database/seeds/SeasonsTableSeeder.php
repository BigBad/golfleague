<?php

class SeasonsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('seasons')->delete();

        Season::create(array('year' => '2013'));
		Season::create(array('year' => '2014'));
		Season::create(array('year' => '2015'));
    }

}