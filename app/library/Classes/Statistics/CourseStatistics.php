<?php namespace GolfLeague\Statistics\Course;


interface CourseStatistics {

    public function averageScore($courseId);
    public function averageScoreByPlayer($courseId, $playerId);
    public function averageScoreByYear($courseId, $year);
    public function averageScoreByPlayerAndYear($courseId, $playerId, $year);

}