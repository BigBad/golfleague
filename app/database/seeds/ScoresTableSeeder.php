<?php

class ScoresTableSeeder extends Seeder {

    public function run()
    {
        DB::table('scores')->delete();

        //Schmidt 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '1', 'total' => '43' ));
		Score::create(array('date' => '2013-06-02', 'player_id' => '1', 'total' => '39' ));
		Score::create(array('date' => '2013-06-03', 'player_id' => '1', 'total' => '44' ));
		Score::create(array('date' => '2013-06-04', 'player_id' => '1', 'total' => '53' ));
		Score::create(array('date' => '2013-06-05', 'player_id' => '1', 'total' => '43' ));
		Score::create(array('date' => '2013-06-06', 'player_id' => '1', 'total' => '44' ));
		Score::create(array('date' => '2013-06-07', 'player_id' => '1', 'total' => '45' ));
		Score::create(array('date' => '2013-06-08', 'player_id' => '1', 'total' => '46' ));
		Score::create(array('date' => '2013-06-09', 'player_id' => '1', 'total' => '39' ));
		Score::create(array('date' => '2013-06-10', 'player_id' => '1', 'total' => '42' ));
		Score::create(array('date' => '2013-06-11', 'player_id' => '1', 'total' => '42' ));
		Score::create(array('date' => '2013-06-12', 'player_id' => '1', 'total' => '44' ));
		Score::create(array('date' => '2013-06-13', 'player_id' => '1', 'total' => '42' ));
		Score::create(array('date' => '2013-06-14', 'player_id' => '1', 'total' => '43' ));		
		
	
		//Hutter 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '2', 'total' => '42' ));
		Score::create(array('date' => '2013-06-02', 'player_id' => '2', 'total' => '40' ));
		Score::create(array('date' => '2013-06-03', 'player_id' => '2', 'total' => '43' ));
		Score::create(array('date' => '2013-06-04', 'player_id' => '2', 'total' => '41' ));
		Score::create(array('date' => '2013-06-05', 'player_id' => '2', 'total' => '40' ));
		Score::create(array('date' => '2013-06-06', 'player_id' => '2', 'total' => '38' ));
		Score::create(array('date' => '2013-06-07', 'player_id' => '2', 'total' => '40' ));
		Score::create(array('date' => '2013-06-08', 'player_id' => '2', 'total' => '42' ));
		Score::create(array('date' => '2013-06-09', 'player_id' => '2', 'total' => '38' ));
		Score::create(array('date' => '2013-06-10', 'player_id' => '2', 'total' => '36' ));
		Score::create(array('date' => '2013-06-11', 'player_id' => '2', 'total' => '41' ));
		Score::create(array('date' => '2013-06-12', 'player_id' => '2', 'total' => '40' ));
		Score::create(array('date' => '2013-06-13', 'player_id' => '2', 'total' => '40' ));
		Score::create(array('date' => '2013-06-14', 'player_id' => '2', 'total' => '40' ));
		
		//Brown 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '47' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '42' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '42' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '42' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '40' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '40' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '40' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '43' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '41' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '47' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '37' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '3', 'total' => '40' ));
		
		//Martin 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '4', 'total' => '37' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '4', 'total' => '43' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '4', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '4', 'total' => '40' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '4', 'total' => '36' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '4', 'total' => '43' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '4', 'total' => '43' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '4', 'total' => '36' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '4', 'total' => '37' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '4', 'total' => '42' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '4', 'total' => '40' ));
		
		//Saldana 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '5', 'total' => '57' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '5', 'total' => '54' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '5', 'total' => '57' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '5', 'total' => '53' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '5', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '5', 'total' => '53' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '5', 'total' => '54' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '5', 'total' => '58' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '5', 'total' => '56' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '5', 'total' => '58' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '5', 'total' => '53' ));
		
		
		//Zimmer 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '47' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '52' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '49' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '40' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '39' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '45' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '40' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '44' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '6', 'total' => '40' ));
		
		//Pohlabel 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '51' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '47' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '42' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '51' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '47' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '48' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '49' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '52' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '44' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '7', 'total' => '47' ));
		
		
		//Fishbach 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '50' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '50' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '47' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '47' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '52' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '52' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '58' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '47' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '45' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '48' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '48' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '8', 'total' => '51' ));
		
		// Homan 2013 scores
			// no 2013 scores
		
		// Tomsic 2013 scores
			// no 2013 scores
			
		// Watkins 2013 scores
			// no 2013 scores
		
		// Collins 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '50' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '44' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '50' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '51' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '45' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '48' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '49' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '45' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '42' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '45' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '41' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '42' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '12', 'total' => '48' ));
		
		// Braswell 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '13', 'total' => '48' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '13', 'total' => '52' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '13', 'total' => '54' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '13', 'total' => '48' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '13', 'total' => '52' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '13', 'total' => '53' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '13', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '13', 'total' => '53' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '13', 'total' => '48' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '13', 'total' => '49' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '13', 'total' => '42' ));
		
		// Barker 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '50' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '43' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '43' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '49' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '41' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '53' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '44' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '42' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '52' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '42' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '42' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '14', 'total' => '46' ));
		
		// Moore 2013 scores
		Score::create(array('date' => '2013-06-01', 'player_id' => '15', 'total' => '45' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '15', 'total' => '52' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '15', 'total' => '43' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '15', 'total' => '44' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '15', 'total' => '44' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '15', 'total' => '46' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '15', 'total' => '44' ));
		Score::create(array('date' => '2013-06-01', 'player_id' => '15', 'total' => '43' ));
		
		// Dainon 2013 scores
			// no 2013 scores
			
		// Caleb 2013 scores
			// no 2013 scores
			
		// Metro 2013 scores
			// no 2013 scores
		
		
    }
	

}