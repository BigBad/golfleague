<?php

namespace GolfLeague;
use \Holescore as Holescore;
use \Hole as Hole;
use \Round as Round;
use \Player as Player;

//Determines a net score using Equitable Scoring Control for individual hole
/*
Course Handicap   Maximum Score
4.5 or less                    Double Bogey(+2)
5–9.5                                       7
9.6–14.5                                    8
14.6–19.5                                   9
19.6 or more                               10
*/

class EquitableStrokeControl {

	public function __construct(Holescore $holescore)
	{
		$this->holescore= $holescore;
	}

	public function calculate()
	{
		//holescore
		$holescore = $this->holescore->score; // Gross score on hole

		//Use Round to get player_id
		$player = Round::find($this->holescore->round_id)->player_id;

		//Get player's handicap
		$handicap = Player::find($player)->handicap;

		//Get par for hole
		$holePar = Hole::find($this->holescore->hole_id)->par;

		//Use par and handicap to determine max score for a hole
		$maxScore = $this->maxAllowableScore($holePar, $handicap);

		if($holescore > $maxScore) {
			return $maxScore;
		}
		return $holescore;

	}

	private function maxAllowableScore($par, $handicap)
	{
		switch($handicap) {
			case ($handicap < 4.6):
				$maxScore = $par + 2;
				break;
			case (($handicap >= 4.6) && ($handicap < 9.6)):
				$maxScore = 7;
				break;
			case (($handicap >= 9.6) && ($handicap < 14.6)):
				$maxScore = 8;
				break;
			case (($handicap >= 14.6) && ($handicap < 19.6)):
				$maxScore = 9;
				break;
			case ($handicap >= 19.6):
				$maxScore = 10;
		}

		return $maxScore;
	}
}
