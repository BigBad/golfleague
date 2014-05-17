<?php

class ScoreController extends \BaseController {

    public function __construct(Score $score, HoleScore $holescore)
    {
        $this->score = $score;
		$this->holescore = $holescore;
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function view()
    {
		$view = View::make('EnterScore');
        return $view;
    }

        /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
		//return Input::all();
		
		$this->score->date = Input::get('date');
		$this->score->player_id = Input::get('player');
		$this->score->total = 36;
		$this->score->save();    
		$score_id = $this->score->id;
		return $score_id;
		
		//$this->holescore->hole_id
		//Insert score
		//run handicap analysis
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