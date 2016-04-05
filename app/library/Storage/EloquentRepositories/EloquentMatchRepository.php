<?php namespace GolfLeague\Storage\Match;

use Carbon\Carbon;
use \Match as Match;
use \Round as Round;
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
		//update course
		$currentMatch = $this->match->find($matchdata['match']);
		$currentMatch->course_id = $matchdata['course']; //update course
		$currentMatch->update();

		//Remove players from match_players
		$currentMatch->players()->detach();

		//Remove rounds
		Round::where('match_id', '=', $currentMatch->id)->delete();

		//Add players to  match_players
		foreach ($matchdata['player'] as $key => $player) {
			$currentPlayer = $this->player->find($player['player_id']);
			$attributes = array(
				"level_id" => $player['level_id'],
				"group" => $player['group'],
				"handicap" => $currentPlayer->handicap,
				"winnings" => 0,
			);
			$currentPlayer->matches()->attach($currentMatch, $attributes); //save match_player pivot data

			$newRound = array(
				'date' => $currentMatch->date,
				"player_id" => $player['player_id'],
				"course_id" => $player['group'],
				"match_id" => $currentMatch->course,
				"score" => 0,
				"esc" => 0
			);
			//Create New round for player
			Round::create($newRound);

		}// End foreach
	}

	public function delete($matchId)
	{
		return 'deleted';
	}

}
