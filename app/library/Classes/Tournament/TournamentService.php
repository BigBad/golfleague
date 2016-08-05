<?php

namespace GolfLeague\Tournament;

use \Tournament as Tournament;
use \Tournamentdate as Tournamentdate;
use Match as Match;

class TournamentService
{

    public function create($input)
    {
        $tournament = new Tournament($input);
        $tournament->save();

        foreach ($input['dates'] as $date){
            $tournamentDate = new Tournamentdate(array('date' => $date));
            $tournament->dates()->save($tournamentDate);
        }
    }

    public function getByMatchId($id)
    {
        //Get Match date and check tournament table for a tournament on that date
        $match = Match::find($id);
        $date = $match->date;
        
        $tournamentDate = Tournamentdate::select('tournament_id')->where('date', '=', $date)->get();
        return $tournamentDate;
    }

    public function get($id)
    {
        $tournament = Tournament::find($id);
        return $tournament;
    }

}