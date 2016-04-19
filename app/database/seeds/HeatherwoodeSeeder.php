<?php
/**
 * Created by PhpStorm.
 * User: mschmidt
 * Date: 4/19/2016
 * Time: 7:42 AM
 */

class HeatherwoodeSeeder extends Seeder {

    public function run()
    {
        Course::create(array('id' => 4,  'name' => 'Heatherwoode Front', 'rating' => '35.5', 'slope' => '62.5', 'par' => '36'));
        Course::create(array('id' => 5, 'name' => 'Heatherwoode Back', 'rating' => '35.5', 'slope' => '62.5', 'par' => '35'));


        ////////////// Heatherwoode Front ////////////////////
        Hole::create(array(
            'course_id' => '4',
            'number' => '1',
            'par' => '4',
            'yards' => '390',
            'handicap' => '6'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '2',
            'par' => '4',
            'yards' => '419',
            'handicap' => '2'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '3',
            'par' => '3',
            'yards' => '189',
            'handicap' => '8'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '4',
            'par' => '5',
            'yards' => '520',
            'handicap' => '1'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '5',
            'par' => '4',
            'yards' => '396',
            'handicap' => '3'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '6',
            'par' => '4',
            'yards' => '388',
            'handicap' => '5'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '7',
            'par' => '4',
            'yards' => '364',
            'handicap' => '7'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '8',
            'par' => '3',
            'yards' => '161',
            'handicap' => '9'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '9',
            'par' => '5',
            'yards' => '472',
            'handicap' => '4'
        ));
        ////////////// Heatherwoode Back ////////////////////
        Hole::create(array(
            'course_id' => '4',
            'number' => '10',
            'par' => '4',
            'yards' => '384',
            'handicap' => '7'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '11',
            'par' => '5',
            'yards' => '523',
            'handicap' => '1'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '12',
            'par' => '3',
            'yards' => '137',
            'handicap' => '9'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '13',
            'par' => '4',
            'yards' => '343',
            'handicap' => '6'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '14',
            'par' => '4',
            'yards' => '395',
            'handicap' => '5'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '15',
            'par' => '4',
            'yards' => '372',
            'handicap' => '3'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '16',
            'par' => '4',
            'yards' => '423',
            'handicap' => '2'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '17',
            'par' => '3',
            'yards' => '169',
            'handicap' => '8'
        ));
        Hole::create(array(
            'course_id' => '4',
            'number' => '18',
            'par' => '4',
            'yards' => '425',
            'handicap' => '4'
        ));

    }

}