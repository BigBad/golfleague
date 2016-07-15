<?php

namespace GolfLeague\Services;

use GolfLeague\Storage\MatchRound\MatchRoundRepository as MatchRound;
use \Course;

class LeaderboardService
{
	public function __construct(MatchRound $matchRoundRepo)
    {
        $this->matchround = $matchRoundRepo;
    }

	public function calculate($matchId, $type)
	{
		$rounds = $this->matchround->getByMatch($matchId);
		$leaderboard = array();
		foreach ($rounds as $round){
			$holescores = $round->holescores;
				//Filter out NULL scores
				$filteredHolecores = $holescores->filter(function($holescore){
					if ($holescore->score != null) {
						return true;
					}
				});
			//at this point have a collection of filtered holescores
			$holescoreCount =  $filteredHolecores->count();
			$par = $this->currentParTotal($round->course_id, $holescoreCount);

			if($type === 'net') {

				$handicap = round($this->matchround->getMatchPlayerHandicap($matchId, $round->player->id),0);
				//$handicap = round($round->player->handicap,0);
				$par = $handicap + $par;
            }
			$playerScore = $filteredHolecores->sum('score');

			$player = [
				"name" => $round->player->name,
				"score" => $playerScore - $par,
			];
			array_push($leaderboard, $player);
		}
		$name = array();
		$score = array();
		foreach ($leaderboard as $key => $player) {
			$name[$key]  = $player['name'];
			$score[$key] = $player['score'];
		}

		array_multisort($score, SORT_ASC, $name, SORT_ASC, $leaderboard);
		return $leaderboard;

	}
	/*
	 * Given a courseID and #of holes played return par total
	 * @return int
	 */
	public function currentParTotal($courseId, $holesPlayed)
    {
        //find par total for course given number of holes played
		$holes = Course::find($courseId)->holes;
		$filteredHoles =$holes->slice(0,$holesPlayed);
		return $filteredHoles->sum('par'); // Par for given number of holes

    }


}