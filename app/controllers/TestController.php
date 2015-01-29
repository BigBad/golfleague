<?php

use GolfLeague\EquitableStrokeControl;
use GolfLeague\Handicap;

class TestController extends \BaseController {

    public function __construct(Round $round, Holescore $holescore, EquitableStrokeControl $esc)
    {
        $this->round = $round;
        $this->holescore = $holescore;
        $this->esc = $esc;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function view()
    {
        //return View::make('test');
		//test Handicap
        $player = \Player::find(2);
        $handicap = new Handicap($player);
        return $handicap->calculate();
        

        /*test ESC
		
        $holescore = \Holescore::find(2);
        $esc = new EquitableStrokeControl($holescore);
        return $esc->calculate();
		*/
		
    }

        /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //{"date":"2014-05-13","player":"1","course":"1","hole_id_1":"1","hole_1":"4","hole_id_2":"2","hole_2":"4","hole_id_3":"3","hole_3":"4","hole_id_4":"4","hole_4":"4","hole_id_5":"5","hole_5":"4","hole_id_6":"6","hole_6":"4","hole_id_7":"7","hole_7":"4","hole_id_8":"8","hole_8":"4","hole_id_9":"9","hole_9":"4"}

        //return Input::all();


        //Insert gross score
        $this->score->date = Input::get('date');
        $this->score->player_id = Input::get('player');
        $this->score->total = Input::get('total');
        $this->score->save();
        $score_id = $this->score->id;

        //Insert ESC score
        return $this->esc->calculate();

        //Insert hole scores
        $i = 1;
        while ( $i <=9 ) {
            $holescore = new Holescore;
            $hole_id = "hole_id_" . $i;
            $score = "hole_" . $i;
            $holescore->score = Input::get($score);
            $holescore->hole_id = Input::get($hole_id);
            $holescore->score_id = $score_id;
            $holescore->save();
            $i++;
        }


        //run handicap analysis
        $differentialArray = array(0,1,1,1,1,1,1,2,2,3,3,4,4,5,5,6,6,7,8,9,10);
        $scores = Score::where('player_id', '=', $this->score->player_id)->orderBy('date', 'desc')->take(20)->get();
        $differential = $differentialArray[$scores->count()];
        echo "Number of scores " . $scores->count() . " ";
        echo "Number of differentials " . $differential . " ";
        //$scores = $scores->toArray();
        $differentials = array();
        $i = 1;
        foreach ($scores as $score) {
                $differentials[$i]  = $score->total;
                $i++;
        }
        sort($differentials);
        $chunkedScores = array_chunk($differentials,$differential,true);
        $scoresToUse = $chunkedScores[0];

        $sumofDifferentials = array_sum($scoresToUse);
        $handicap = (($sumofDifferentials / $differential) * .96) - 36;
        $handicap = round($handicap ,2);
        print_r($scoresToUse);

        echo $handicap;

        $player = Player::find( $this->score->player_id);
        $player->handicap = $handicap;
        $player->save();
    }

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
