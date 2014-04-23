<?php

class MatchesController extends \BaseController {

    public function __construct(Match $match, Course $course)
    {
        $this->match = $match;
		$this->course = $course;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getMatches()
    {
		$matches = $this->match->getAllMatches();
		return $matches;
		foreach(Match::all() as $match)
		{
			echo $match;
			echo $match->course->name;
			echo $match->season->year;
			echo $match->singlesPlayer;
		}
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        $operation = Input::get('oper');
        switch ($operation) {
        case "add":
            $this->match->player_1_team_1 = Input::get('player_1_team_1');
			$this->match->player_2_team_1 = Input::get('player_2_team_1');
			$this->match->player_1_team_2 = Input::get('player_1_team_2');
			$this->match->player_2_team_2 = Input::get('player_2_team_2');
			$this->match->course_id = Input::get('course_id');
			$this->match->season_id = Input::get('season_id');
			$this->match->date = Input::get('date');
            $this->match->save();            
            break;
        case "edit":
            $id = Input::get('id');
            $this->match = $this->match->find($id);
			$this->match->player_1_team_1 = Input::get('player_1_team_1');
			$this->match->player_2_team_1 = Input::get('player_2_team_1');
			$this->match->player_1_team_2 = Input::get('player_1_team_2');
			$this->match->player_2_team_2 = Input::get('player_2_team_2');
			$this->match->course_id = Input::get('course_id');
			$this->match->season_id = Input::get('season_id');
			$this->match->date = Input::get('date');
            $this->match->save();
            break;
        case "del":
            $id = Input::get('id');
            $this->match = $this->match->destroy($id);
            break;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
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