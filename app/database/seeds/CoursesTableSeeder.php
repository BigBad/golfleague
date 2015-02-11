<?php

class CoursesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();
		
		Course::create(array('id' => '0', 'name' => 'unknown', 'rating' => '0', 'slope' => '0', 'par' => '0'));
        Course::create(array('name' => 'Heritage', 'rating' => '35.7', 'slope' => '63.5', 'par' => '36'));
		Course::create(array('name' => 'Legend', 'rating' => '36.2', 'slope' => '67.5', 'par' => '36'));
		Course::create(array('name' => 'Vintage', 'rating' => '35.1', 'slope' => '66.5', 'par' => '36'));	
    }

}