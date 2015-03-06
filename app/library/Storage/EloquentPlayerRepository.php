<?php namespace GolfLeague\Storage\Player;

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
	public function __construct(Player $player)
    {
		$this->player = $player;
    }

    public function all()
    {
        return $this->player->eagerLoadAll()->all();
    }

    //Find Player by Player Id
    public function find($playerId)
    {
        //return Round::with('player', 'holescores')->where('player_id', '=', $playerId)->get();
    }

    public function create($matchdata)
    {

    }

}
