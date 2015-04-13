<?php namespace GolfLeague\Storage\MatchRound;

use \Match as Match;
use \Round as Round;
use \Player as Player;

class EloquentMatchRoundRepository implements MatchRoundRepository
{
  /*Return Score collections that include:
   * Player Name
   * Date
   * Total
   * Course
   * Multideminsional Array of Hole Numbers and scores
   **/

   //Retrieve all rounds associated with a match with holescores
    public function all()
    {
        return Round::with('player', 'holescores')->whereNotNull('match_id')->get();
    }

    // Retrieve Rounds of a match with holescores
    // Return data is sorted by the order of the holes of the round
    public function getByMatch($matchid)
    {
		return Round::with('player', 'holescores')->where('match_id', '=', $matchid)->get();
    }

    public function create($matchdata)
    {

    }

	public function matchGroup($matchid, $group)
	{
        $players = Match::find($matchid)->players()->where('match_player.group','=',$group)->get();
		foreach($players as $key => $player) {
			$rounds = Round::with('holescores', 'course.holes')->where('player_id', '=', $player->id)->where('match_id', '=', $matchid)->get();
            $players[$key]['round'] = $rounds;
		}
		return $players;
	}

    public function getMatchData($matchid)
    {
        return $matchid;
    }
}
