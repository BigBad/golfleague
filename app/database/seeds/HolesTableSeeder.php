<?php

class HolesTableSeeder extends Seeder {

public function run()
    {
        DB::table('holes')->delete();

		////////////// HERITAGE ////////////////////
        Hole::create(array(
					'course_id' => '1', 
					'number' => '1', 
					'par' => '5', 
					'yards' => '475',
					'handicap' => '5'
		));
		Hole::create(array(
					'course_id' => '1', 
					'number' => '2', 
					'par' => '4', 
					'yards' => '380',
					'handicap' => '4'
		));
		Hole::create(array(
					'course_id' => '1', 
					'number' => '3', 
					'par' => '3', 
					'yards' => '150',
					'handicap' => '9'
		));
		Hole::create(array(
					'course_id' => '1', 
					'number' => '4', 
					'par' => '4', 
					'yards' => '430',
					'handicap' => '2'
		));
		Hole::create(array(
					'course_id' => '1', 
					'number' => '5', 
					'par' => '4', 
					'yards' => '312',
					'handicap' => '7'
		));
		Hole::create(array(
					'course_id' => '1', 
					'number' => '6', 
					'par' => '5', 
					'yards' => '556',
					'handicap' => '1'
		));
		Hole::create(array(
					'course_id' => '1', 
					'number' => '7', 
					'par' => '3', 
					'yards' => '179',
					'handicap' => '8'
		));
		Hole::create(array(
					'course_id' => '1', 
					'number' => '8', 
					'par' => '4', 
					'yards' => '429',
					'handicap' => '3'
		));
		Hole::create(array(
					'course_id' => '1', 
					'number' => '9', 
					'par' => '4', 
					'yards' => '380',
					'handicap' => '6'
		));
		////////////// LEGEND ////////////////////
		Hole::create(array(
					'course_id' => '2', 
					'number' => '10', 
					'par' => '4', 
					'yards' => '403',
					'handicap' => '4'
		));
		
		Hole::create(array(
					'course_id' => '2', 
					'number' => '11', 
					'par' => '4', 
					'yards' => '342',
					'handicap' => '7'
		));
		Hole::create(array(
					'course_id' => '2', 
					'number' => '12', 
					'par' => '5', 
					'yards' => '563',
					'handicap' => '2'
		));
		Hole::create(array(
					'course_id' => '2', 
					'number' => '13', 
					'par' => '3', 
					'yards' => '141',
					'handicap' => '9'
		));
		Hole::create(array(
					'course_id' => '2', 
					'number' => '14', 
					'par' => '4', 
					'yards' => '401',
					'handicap' => '6'
		));
		Hole::create(array(
					'course_id' => '2', 
					'number' => '15', 
					'par' => '4', 
					'yards' => '384',
					'handicap' => '5'
		));
		Hole::create(array(
					'course_id' => '2', 
					'number' => '16', 
					'par' => '3', 
					'yards' => '196',
					'handicap' => '8'
		));
		Hole::create(array(
					'course_id' => '2', 
					'number' => '17', 
					'par' => '4', 
					'yards' => '402',
					'handicap' => '3'
		));
		Hole::create(array(
					'course_id' => '2', 
					'number' => '18', 
					'par' => '5', 
					'yards' => '539',
					'handicap' => '1'
		));
		
		////////////// VINTAGE ////////////////////
		Hole::create(array(
					'course_id' => '3', 
					'number' => '1', 
					'par' => '4', 
					'yards' => '393',
					'handicap' => '3'
		));
		
		Hole::create(array(
					'course_id' => '3', 
					'number' => '2', 
					'par' => '3', 
					'yards' => '196',
					'handicap' => '8'
		));
		Hole::create(array(
					'course_id' => '3', 
					'number' => '3', 
					'par' => '4', 
					'yards' => '325',
					'handicap' => '9'
		));
		Hole::create(array(
					'course_id' => '3', 
					'number' => '4', 
					'par' => '4', 
					'yards' => '383',
					'handicap' => '4'
		));
		Hole::create(array(
					'course_id' => '3', 
					'number' => '5', 
					'par' => '3', 
					'yards' => '166',
					'handicap' => '5'
		));
		Hole::create(array(
					'course_id' => '3', 
					'number' => '6', 
					'par' => '4', 
					'yards' => '396',
					'handicap' => '2'
		));
		Hole::create(array(
					'course_id' => '3', 
					'number' => '7', 
					'par' => '5', 
					'yards' => '510',
					'handicap' => '1'
		));
		Hole::create(array(
					'course_id' => '3', 
					'number' => '8', 
					'par' => '4', 
					'yards' => '308',
					'handicap' => '7'
		));
		Hole::create(array(
					'course_id' => '3', 
					'number' => '9', 
					'par' => '5', 
					'yards' => '509',
					'handicap' => '6'
		));
		
    }

}