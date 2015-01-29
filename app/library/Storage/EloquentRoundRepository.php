<?php namespace GolfLeague\Storage\Round; 

use \Round as Round; 

class EloquentRoundRepository implements RoundRepository 
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
        return Round::eagerLoadAll()->all();
    }

    //Find Scores by Player Id

    public function find($playerId)
    {
        return Round::with('player', 'holescores')->where('player_id', '=', $playerId)->get();
    }

    public function create($input)
    {
        return Round::create($input);
    }
}
