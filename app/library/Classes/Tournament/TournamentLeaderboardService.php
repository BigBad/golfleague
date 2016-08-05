<?php
/**
 * Created by PhpStorm.
 * User: mschmidt
 * Date: 8/4/2016
 * Time: 1:35 PM
 */

namespace GolfLeague\Tournament;

use \Tournament as Tournament;
use GolfLeague\Tournament\TournamentFactory as TournamentFactory;

class TournamentLeaderboardService
{

    public function get($id)
    {
        $tournament = Tournament::find($id)->toArray();
        $tournamentFactory= new TournamentFactory;
        $tournamentType = $tournamentFactory->create($tournament);
        return $tournamentType->getLeaderboard();

    }
}