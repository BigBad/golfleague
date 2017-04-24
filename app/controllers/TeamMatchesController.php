<?php

use GolfLeague\Services\MatchService as MatchService;
use GolfLeague\Storage\MatchRound\MatchRoundRepository as MatchRoundRepository;
use GolfLeague\Storage\Team\TeamMatchesRepository as TeamMatchesRepository;

class TeamMatchesController extends \BaseController {

    public function __construct(MatchService $match, MatchRoundRepository $matchRoundRepo, TeamMatchesRepository $teamMatchesRepository)
    {
        $this->match = $match;
        $this->matchRoundRepo = $matchRoundRepo;
        $this->teamMatchesRepo = $teamMatchesRepository;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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


        $group = Input::get('group');


        $groupPlayers = $this->matchRoundRepo->matchGroup($id, $group);

        //Create Player data
        $matchUp = array();
        foreach($groupPlayers as $key=>$groupPlayer){
            $matchUp[$key]['player'] = $groupPlayer->pivot->player_id;
            $matchUp[$key]['matchHandicap'] = round($groupPlayer->pivot->handicap ,0);
            foreach ($groupPlayer->round as $round){
                $matchUp[$key]['team'] = $round->team_id;
                $matchUp[$key]['course'] = $round->course_id;
                $matchUp[$key]['holescores'] = $round->holescores;
            }

        }

        // Change lowest handicap to ZERO and change others to reflect it
            foreach($matchUp as $key=>$match){
                $matchHandicaps[] = $match['matchHandicap'];
            }
            $lowestMatchHandicap = min($matchHandicaps);
            //handicap change
            $handicapChange = $lowestMatchHandicap * -1;
            foreach($matchUp as $key=>$match){
                $matchUp[$key]['matchHandicap'] = $match['matchHandicap'] + $handicapChange;
            }

        // Separate two teams
            $team1 = array(array_shift ($matchUp));
            $team1Id = $team1[0]['team'];
            $team1Name = Team::select('name')->where('id', '=', $team1Id)->get()->toArray();
            foreach($matchUp as $key=>$match){
                if($match['team'] == $team1[0]['team']){
                    $team1[] = $match;
                    unset($matchUp[$key]);
                }
            }
            $team2 = $matchUp;
            $team2Id = $team2[1]['team'];
            $team2Name = Team::select('name')->where('id', '=', $team2Id)->get()->toArray();

            $holesData = Hole::select('handicap')->where('course_id', '=', $team1[0]['course'])->get();

            $team1Scores = $this->getTeamNetScore($team1, $holesData);
            $team2Scores = $this->getTeamNetScore($team2, $holesData);

            $team1Points = $this->calculatePoints($team1Scores, $team2Scores);
            $team2Points = $this->calculatePoints($team2Scores, $team1Scores);

            //Save Points in Teammatches
            Teammatch::where('match_id', '=', $id)->where('team_id', '=', $team1Id)->update(array('pointsWon' => $team1Points));
            Teammatch::where('match_id', '=', $id)->where('team_id', '=', $team2Id)->update(array('pointsWon' => $team2Points));


        //Need to determine if same amount of scores are in both
        // If not then do not return

            foreach($team1Scores as $key=>$teamScore){
                if($teamScore <= 0){
                    $team1Scores[$key] = '';
                }
            }

        foreach($team2Scores as $key=>$teamScore){
            if($teamScore <= 0){
                $team2Scores[$key] = '';
            }
        }

        $team[0] = [
            "team" =>  $team1Name[0]['name'],
            "hole1" => $team1Scores[0],
            "hole2" => $team1Scores[1],
            "hole3" => $team1Scores[2],
            "hole4" => $team1Scores[3],
            "hole5" => $team1Scores[4],
            "hole6" => $team1Scores[5],
            "hole7" => $team1Scores[6],
            "hole8" => $team1Scores[7],
            "hole9" => $team1Scores[8],
            "points" =>$team1Points
        ];

        $team[1] = [
            "team" =>  $team2Name[0]['name'],
            "hole1" => $team2Scores[0],
            "hole2" => $team2Scores[1],
            "hole3" => $team2Scores[2],
            "hole4" => $team2Scores[3],
            "hole5" => $team2Scores[4],
            "hole6" => $team2Scores[5],
            "hole7" => $team2Scores[6],
            "hole8" => $team2Scores[7],
            "hole9" => $team2Scores[8],
            "points" => $team2Points
        ];

        $data['data'] = $team;
        return $data;
	}

    private function getTeamNetScore($team, $holesData)
    {
        foreach($team as $key=>$item){
            // Create holes array for NET
            $holes = array();
            $i = 1;
            foreach($holesData as $key=>$holeData){
                $holes[$i] = $holeData->handicap;
                $i++;
            }

            // Create stroke array - how many to take away from score
            $strokeArray = [
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
                6 => 0,
                7 => 0,
                8 => 0,
                9 => 0
            ];
            //Create array of strokes
            for($counter = $item['matchHandicap']; $counter > 0; $counter--){
                if($counter > 9){
                    $newCounter = $counter - 9;
                    while($newCounter > 0) {
                        $strokeArray[$newCounter] = $strokeArray[$newCounter] + 1;
                        $counter--;
                        $newCounter--;
                    }
                }
                $strokeArray[$counter] = $strokeArray[$counter] + 1;
            }
            // Plus handicaps don't hit previous loop so need its own
            //Plus handicap logic

            foreach($strokeArray as $strokeKey=>$stroke){
                $holeKey = array_search($strokeKey,$holes);
                $holes[$holeKey] = $stroke;
            }

            ///now have array of strokes to subtract
            //get array of holescores

            $holeScores = $item['holescores'];
            foreach($holeScores as $key=>$holeScore){
                //check if new score is less PlayerScores
                if(isset($playerScores[$key])){ // 2nd time in for hole
                    if($playerScores[$key] >= $holeScore['score']){
                        $playerScores[$key] = $holeScore['score'] - $holes[$key+1];
                    }
                } else{ // first time in for hole
                    if($holeScore['score'] != null){
                        $playerScores[$key] = $holeScore['score'] - $holes[$key+1];
                    } else{
                        $playerScores[$key] = null;
                    }
                }
            }

        }
        return $playerScores;
    }

    private function calculatePoints($team, $opponent)
    {
        $points = 0;
        $teamTotalScore = 0;
        $opponentTotalScore = 0;
        foreach ($team as $key=>$score){
            if($score != null){
                if($score < $opponent[$key]){
                    $points++;
                }
                if($score == $opponent[$key]){
                    $points = $points + .5;
                }
            }
            $teamTotalScore = $teamTotalScore + $score;
            $opponentTotalScore = $opponentTotalScore + $score;
        }
        // Bonus point logic
        if($team[8] != null && $opponent[8] != null){
            if($teamTotalScore > $opponentTotalScore){
                $points = $points + 1;
            }
            if($teamTotalScore == $opponentTotalScore){
                $points = $points + .5;
            }
        }
        return $points;
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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

	public function getPointsByYear($year)
    {
        $teamMatches = Teammatch::select('team_id','pointsWon')->whereYear('created_at', '=', $year)->with('team')->get();
        foreach ($teamMatches as $key=>$teamMatch) {
            $pointsData[$key]['name'] = $teamMatch['team']['name'];
            $pointsData[$key]['points'] = $teamMatch['pointsWon'];
        }
        $data['data'] = $pointsData;
        return $data;
    }


}
