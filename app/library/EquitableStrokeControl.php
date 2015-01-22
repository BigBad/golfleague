<?php

namespace GolfLeague;

class EquitableStrokeControl {

    public function calculate()
    {
        //Get last 20 scores
        //$scores = \Score::with('holescores','holescores.hole.course')->has('holescores')->where('player_id', '=', 1)->get();
        //$scores =  \Score::with('holescores','holescores.hole.course')->where('player_id', '=', 1)->orderBy('date', 'desc')->take(20)->get();
        //return $scores;
        $x=1;
        while($x<15){
        $player = \Player::find($x);  // Get Player
        $holescores = $player->holescores; // Get Players Holescores

        //$holescores = \Holescore::with('hole','score')->players()->get();
        //return $holescores;

        $birdies = 0;
		$pars = 0;
		$bogeys = 0;
		$doubleBogeys = 0;
		$triples = 0;
		$others = 0;
		$holes = 0;
		foreach ($holescores as $holescore) {
			$diff = ($holescore->score) - ($holescore->hole->par);

			switch ($diff) {
				case -1:
					$birdies++;
					break;
				case 0:
					$pars++;
					break;
				case 1:
					$bogeys++;
					break;
				case 2:
					$doubleBogeys++;
					break;
				case 3:
					$triples++;
					break;
				case ($diff > 3):
					$others++;
					break;
			}
			$holes++;
			//echo $holescore->hole->number .  " score = " . $holescore->score ." " . $diff . "<br>";

		}
		echo $player->name . "<br>";
        echo "Number of holes played  = " . $holes . "<br>";
		echo "Number of birdies =" . $birdies . "     - " . round($birdies/$holes,2)*100 . "%<br>";
		echo "Number of pars = " . $pars . "    - " . round($pars/$holes,2)*100 . "%<br>";
		echo "Number of bogeys =" . $bogeys . "     - " . round($bogeys/$holes,2)*100 . "%<br>";
		echo "Number of double bogeys = " . $doubleBogeys . "     - " . round($doubleBogeys/$holes,2)*100 . "%<br>";
		echo "Number of triples =" . $triples . "     - " . round($triples/$holes,2)*100 . "%<br>";
		echo "Number of others = " . $others . "     - " . round($others/$holes,2)*100 . "%<br>";
        echo "<br><br>";

        $x++;
        }
		exit();
		$scores = Score::where('player_id', '=', 2)->orderBy('date', 'desc')->take(20)->get();

		foreach( $scores->id as $scoreId) {
			$holescores[$score_id] = Holescore::where('score_id', '=', $scoreId)->get();
		}
		return $scores;
        //Where there are holescores calculate ESC score for each

        $i = 0;
        $lastTwenty = array();
        foreach ($scores as $score)
        {
            $lastTwenty[$i] = $score->total;
            $i++;
            sort($lastTwenty);
        }
        return $lastTwenty;
        //return \Score::find(1)->holescores()->where('player_id', '=', 1)->get();
        //return \Player::with('scores','scores.holescores','scores.holescores.hole.course')->where('id', '=', 2)->get();
    }
}
