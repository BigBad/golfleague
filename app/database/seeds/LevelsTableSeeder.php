<?php

class LevelsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('levels')->delete();

        Level::create(array('name' => 'A'));
		Level::create(array('name' => 'B'));
    }

}