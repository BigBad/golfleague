<?php

namespace GolfLeague\Services;

use GolfLeague\Services\LeaderboardService;
use \Tournament as Tournament;
use \Tournamentdate as Tournamentdate;

class TournamentService
{

    public function create($input)
    {
        //return $input;
        $tournament = new Tournament($input);
        $tournament->save();

        return $tournament;

    }
}