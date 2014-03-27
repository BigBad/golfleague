<?php

class CoursesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();

        Course::create(array('name' => 'Heritage', 'rating' => '35.299999999999997', 'slope' => '63.5', 'par' => '36'));
		Course::create(array('name' => 'Legend', 'rating' => '35.799999999999997', 'slope' => '64.5', 'par' => '36'));
		Course::create(array('name' => 'Vintage', 'rating' => '35.100000000000001', 'slope' => '66.5', 'par' => '36'));		
    }

}