<?php namespace GolfLeague\Statistics\League;


interface LeagueStatistics {

    public function topFiveLowestScores();
    public function topFiveLowestScoresByYear($year);
    public function topFiveScoringAverageByYear($year);
    public function topFiveNetScoresByYear($year);
    public function mostSkinsByYear($year);
    public function totalEagles($year);
    public function totalBirdies($year);
    public function totalPars($year);
    public function totalBogeys($year);
    public function totalDoubles($year);
    public function totalOthers($year);

    public function netScoresByPlayer($playerId);
    public function netScoresByPlayerTop($playerId,$number);
    public function netScoresByPlayerYear($playerId, $year);
    public function netScoresByPlayerTopYear($playerId,$top, $year);

    public function netScoresLeague();
    public function netScoresLeagueTop($number);
    public function netScoresLeagueYear($year);
    public function netScoresLeagueTopYear($top,$year);

    // Cumulative Net returns +/- relative to par
    public function netCumulative();
    public function netCumulativeTop($top);
    public function netCumulativeByPlayer($playerId);
    public function netCumulativeByPlayerTop($playerId,$top);
    public function netCumulativeYear($year);
    public function netCumulativeTopYear($top,$year);
    public function netCumulativeByPlayerYear($playerId,$year);
    public function netCumulativeByPlayerTopYear($playerId,$top,$year);

}