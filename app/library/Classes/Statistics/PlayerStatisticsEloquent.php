<?php namespace GolfLeague\Statistics\Player;

use Carbon\Carbon;
use \Round;
use \Player;
use \Skin;
use \Netwinner;
use \Holescore;


class PlayerStatisticsEloquent implements PlayerStatistics
{
    private $date1 = '-01-01';
    private $date2 = '-12-31';

    public function matchesHandicap($playerId){}
    public function scoringAverage($playerId)
    {
        $today = Carbon::today()->toDateString();
        $rounds = Round::where('player_id', '=', $playerId)
            ->where('date', '<', $today)
            ->get();
        $scores = $rounds->map(function($round)
        {
            return $round->score;
        });
        if($rounds->count() > 0) {
            return round(array_sum($scores->toArray())/($rounds->count()), 2);
        } else {
            return $rounds;
        }
    }
    public function scoringAverageByYear($playerId, $year)
    {
        $date1 = $year . '-01-01';
        $date2 = $year . '-12-31';


        $rounds = Round::where('player_id', '=', $playerId)
            ->where('date', '>=', $date1)
            ->where('date', '<=', $date2)
            ->get();
        $scores = $rounds->map(function($round)
        {
            return $round->score;
        });
        if($rounds->count() > 0) {
            return round(array_sum($scores->toArray())/($rounds->count()), 2);
        } else {
            return $rounds;
        }


    }
    public function scoringAverageMatchesByYear($year){}
    public function handicapRounds($playerId){}

    public function scoringAverageCourse($course){}
    public function scoringAverageCourseByYear($course, $year){}
    public function scoringAverageCourseMatchesByYear($course, $year){}

    public function totalEagles(){}
    public function eaglesByYear($year){}
    public function eaglesMatchesByYear($year){}

    public function totalBirdies($playerId){}
    public function birdiesByYear($playerId, $year)
    {
        $year = $year . '-01-01';
        $holescores = Holescore::with('round.player','hole')
            ->where('created_at', '>', $year)
            ->get();
        $allBirdies = array();
        foreach($holescores as $key => $holescore) {
            if($holescore['round']['match_id'] != null){
                if( ($holescore['hole']['par'] - $holescore['score']) === 1) {
                    $allBirdies[]= $holescore['round']['player']['id'];
                }
            }
        }
        return count(array_keys($allBirdies, $playerId));

    }
    public function birdiesMatchesByYear($year){}

    public function totalPars(){}
    public function parsByYear($year){}
    public function parsMatchesByYear($year){}

    public function totalbogeys(){}
    public function bogeysByYear($year){}
    public function bogeysMatchesByYear($year){}

    public function totalDoubles(){}
    public function doublesByYear($year){}
    public function doublesMatchesByYear($year){}

    public function totalOthers(){}
    public function othersByYear($year){}
    public function othersMatchesByYear($year){}

}