<?php

namespace GolfLeague;

use \Player as Player;
use \Score as Score;

class Handicap
{
	public function __construct(Player $player)
    {
        $this->differentialArray = array(0,1,1,1,1,1,1,2,2,3,3,4,4,5,5,6,6,7,8,9,10);
		$this->player = $player;
    }
	
	public function calculate()
	{
		$scores = Score::where('player_id', '=', $this->player->id)->orderBy('date', 'desc')->take(20)->get();		
		$differential = $this->differential($scores->count());
		
		$i = 1;
		foreach ($scores as $score) {			
				$differentials[$i]  = $score->total;
				$i++;
		}
		sort($differentials);
		$chunkedScores = array_chunk($differentials,$differential,true);
		$scoresUsed = $chunkedScores[0];
		
		$sumofDifferentials = array_sum($scoresUsed);
		$handicap = (($sumofDifferentials / $differential) * .96) - 36;
		$handicap = round($handicap ,2);
		
		return $handicap;
	}
	
	//
	public function differential($numberOfScores)
	{
		return $this->differentialArray[$numberOfScores];
	}


}