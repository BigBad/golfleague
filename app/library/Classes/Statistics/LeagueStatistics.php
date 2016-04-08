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

    public function netScoresLeague();
    public function netScoresLeagueTop($number);
    public function netScoresByPlayer($playerId);
    public function netScoresByPlayerTop($playerId,$number);
    public function netCumulativeByPlayer($playerId);
}