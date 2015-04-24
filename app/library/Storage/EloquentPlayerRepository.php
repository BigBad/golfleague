<?php namespace GolfLeague\Storage\Player;

use \Player as Player;

class EloquentPlayerRepository implements PlayerRepository
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
        return $this->player->orderBy('handicap','asc')->get();
    }

    //Find Player by Player Id
    public function find($playerId)
    {
        //return Round::with('player', 'holescores')->where('player_id', '=', $playerId)->get();
    }

    public function create($name, $handicap)
    {
		$this->player->name = $name;
		$this->player->handicap = $handicap;
		$this->player->save();
    }

}
