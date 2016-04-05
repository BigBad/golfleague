<?php namespace GolfLeague\Statistics\Course;

use \Round;

class CourseStatisticsEloquent implements CourseStatistics
{
    private $date1 = '-01-01';
    private $date2 = '-12-31';

    public function averageScore($courseId)
    {
        $rounds = Round::where('course_id', '=', $courseId)->get();
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
    public function averageScoreByPlayer($courseId, $playerId)
    {
        $rounds = Round::where('course_id', '=', $courseId)
            ->where('player_id', '=', $playerId)
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
    public function averageScoreByYear($courseId, $year)
    {
        $rounds = Round::where('course_id', '=', $courseId)
            ->where('date', '>=', $year . $this->date1)
            ->where('date', '<=', $year . $this->date2)
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
    public function averageScoreByPlayerAndYear($courseId, $playerId, $year)
    {
        $rounds = Round::where('course_id', '=', $courseId)
            ->where('player_id', '=', $playerId)
            ->where('date', '>=', $year . $this->date1)
            ->where('date', '<=', $year . $this->date2)
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

}