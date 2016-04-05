<?php namespace GolfLeague\Storage\Match;

use Carbon\Carbon;
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
		return Match::orderBy('date', 'DESC')->get();
    }

	public function get($matchid)
	{
		 return Match::with('course', 'players', 'course.holes')->find($matchid);
	}

	public function getEditable($matchid)
	{
		return Match::with('course', 'playersEdit', 'course.holes')->find($matchid);
	}

	public function getEditableMatches()
	{
		$today = Carbon::now();
		return Match::with('course', 'players')->where('date', '>=', $today)->get();
	}


	public function getByDate($startDate, $endDate)
	{
		 //dd($startDate);
		 return Match::with('course')->where('date', '>=', $startDate)->where('date', '<=', $endDate)->get();
	}

	public function getYears()
	{
		$dates =  Match::orderBy('date', 'DESC')->get(['date']);
		//return $dates;
		$years = $dates->map(function($years){
			return substr($years->date, 0, 4);
		})->toArray();

		return array_unique($years);
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

		$this->match->save(); //save to match table

		foreach ($matchdata['player'] as $key => $player){
			$currentPlayer = $this->player->find($player['player_id']);
			$attributes = array(
				"level_id" => $player['level_id'],
				"group" => $player['group'],
				"handicap" => $player['handicap'],
				"winnings" => $player['winnings'],
			);
			$currentPlayer->matches()->save($this->match, $attributes); //save match_player pivot data
		}// End foreach
		return $this->match->id;
    }

	public function update($matchdata)
	{
		//return $matchdata;
		foreach ($matchdata['player'] as $player) {
			// update match_player pivot tables
			Match::find($matchdata['match'])
				->players()
				->updateExistingPivot(
					$player['player_id'],
					[
						'level_id' => $player['level_id'],
						'group' => $player['group']
					]
				);
			//delete rounds for the match
			Round::where('match_id', '=', $matchdata['match'])
				->where('player_id', '=', $player['player_id']);
		}

	}

	public function delete($matchId)
	{
		return 'deleted';
	}

}
