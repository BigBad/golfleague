<?php namespace GolfLeague\Storage\Match; 

use \Match as Match; 

class EloquentMatchRepository implements MatchRepository 
{
  /*Return Score collections that include:
   * Player Name
   * Date
   * Total
   * Course
   * Multideminsional Array of Hole Numbers and scores   *
   **/ 

    public function all()
    {
        return Match::eagerLoadAll()->all();
    }

    //Find Scores by Player Id

    public function find($playerId)
    {
        //return Round::with('player', 'holescores')->where('player_id', '=', $playerId)->get();
    }

    public function create($input)
    {
        return $input;
		
		//enter match
		$match = new Match;
		$match->date = $input('date');
		$match->course_id = $input('course');		
		$this->match->save();
		
    }
}
