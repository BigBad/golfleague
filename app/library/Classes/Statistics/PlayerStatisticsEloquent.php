<?php namespace GolfLeague\Statistics\Player;

class PlayerStatisticsEloquent implements PlayerStatistics
{

    public function scoringAverage(){}
    public function scoringAverageByYear($year){}
    public function scoringAverageMatchesByYear($year){}

    public function scoringAverageCourse($course){}
    public function scoringAverageCourseByYear($course, $year){}
    public function scoringAverageCourseMatchesByYear($course, $year){}

    public function totalEagles(){}
    public function eaglesByYear($year){}
    public function eaglesMatchesByYear($year){}

    public function totalBirdies(){}
    public function birdiesByYear($year){}
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