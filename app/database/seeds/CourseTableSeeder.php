<?php

class CourseTableSeeder extends Seeder {

    public function run()
    {
        DB::table('courses')->delete();

        Course::create(array('name' => 'Heritage', 'name' => 'Legend', 'name' => 'Vintage'));
    }

}