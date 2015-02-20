<?php namespace GolfLeague\Storage\Match;

use \Match as Match;
use \Player as Player;

class EloquentMatchRepository implements MatchRepository
{
  /*Return Score collections that include:
   * Player Name
   * Date
   * Total
   * Course
   * Multideminsional Array of Hole Numbers and scores   *
   **/
	public function __construct(Match $match, Player $player)
    {
        $this->match = $match;
		$this->player = $player;
    }

    public function all()
    {
        return $this->player->eagerLoadAll()->all();
    }

    //Find Scores by Player Id

    public function find($playerId)
    {
        //return Round::with('player', 'holescores')->where('player_id', '=', $playerId)->get();
    }

    public function create($matchdata)
    {
		//enter match data to Matches table
		$this->match->date = $matchdata['date'];
		$this->match->course_id = $matchdata['course'];
		$this->match->purse = $matchdata['purse'];
		$this->match->skinsamoney = $matchdata['skinsamoney'];
		$this->match->skinsbmoney = $matchdata['skinsbmoney'];
		$this->match->grossmoney = $matchdata['grossmoney'];
		$this->match->netmoney = $matchdata['netmoney'];

		$this->match->save();


		//return $this->match->id;
		//for each player get and set current handicap



		//enter values into match_player table



    }
}
