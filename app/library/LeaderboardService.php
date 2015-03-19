<?php

namespace GolfLeague\Services;

use GolfLeague\Storage\Round\RoundRepository as Round;
use \Course;

class LeaderboardService
{
	public function __construct(Round $roundRepo)
    {
        $this->roundRepo = $roundRepo;
    }

	public function calculate($matchId, $type)
	{

		$rounds = $this->roundRepo->findByMatch($matchId);
		$leaderboard = array();
		foreach ($rounds as $round){
			$i = 0;
			$holescores = $round->holescores;
				//Filter out NULL scores
				$filteredHolecores = $holescores->filter(function($holescore){
					if ($holescore->score != null) {
						return true;
					}
				});
			//at this point have a collection of filtered holescores
			$holescoreCount =  $filteredHolecores->count();

			$Par =  $this->currentParTotal($round->course_id, $holescoreCount);
			$playerScore = $filteredHolecores->sum('score');

			$player = [
				"name" => $round->player->name,
				"score" => $playerScore - $Par,
			];
			array_push($leaderboard, $player);
		}
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
        //find par total for course given unmber of holes played
		$holes = Course::find($courseId)->holes;
		$filteredHoles =$holes->slice(0,$holesPlayed);
		return $filteredHoles->sum('par'); // Par for given number of holes

    }




}