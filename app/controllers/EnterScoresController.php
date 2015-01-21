<?php

class EnterScoresController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function view()
    {
        /*
		foreach (Score::with('player')->get() as $score) {
			echo $score->player->name . "<br>";
		}
		*/
		$birdies = 0;
		$pars = 0;
		$bogeys = 0;
		$doubleBogeys = 0;
		$triples = 0;
		$others = 0;
		$holes = 1;
		foreach (Holescore::with('hole')->get() as $holescore) {
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
		echo "Number of holes played by all = " . $holes . "<br>";
		echo "Number of birdies =" . $birdies . "     " . round($birdies/$holes,2) . "%<br>";
		echo "Number of pars = " . $pars . "     " . round($pars/$holes,2) . "%<br>";
		echo "Number of bogeys =" . $bogeys . "     " . round($bogeys/$holes,2) . "%<br>";
		echo "Number of double bogeys = " . $doubleBogeys . "     " . round($doubleBogeys/$holes,2) . "%<br>";
		echo "Number of triples =" . $triples . "     " . round($triples/$holes,2) . "%<br>";
		echo "Number of others = " . $others . "     " . round($others/$holes,2) . "%<br>";
		exit();
		$scores = Score::where('player_id', '=', 2)->orderBy('date', 'desc')->take(20)->get();

		foreach( $scores->id as $scoreId) {
			$holescores[$score_id] = Holescore::where('score_id', '=', $scoreId)->get();		
		}
		return $scores;
    }

    /**
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}