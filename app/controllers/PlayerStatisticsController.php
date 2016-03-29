<?php

use GolfLeague\Statistics\Player\PlayerStatistics as PlayerStatistics;

class PlayerStatisticsController extends \BaseController {

	public function __construct(PlayerStatistics $playerStatistics)
	{
		$this->playerStatistics = $playerStatistics;
	}

	public function scoringAverage($playerId)
	{
		return $this->playerStatistics->scoringAverage($playerId);
	}

	public function scoringAverageByYear($playerId, $year)
	{
		return $this->playerStatistics->scoringAverageByYear($playerId, $year);
	}

	public function birdiesByYear($playerId, $year)
	{
		return $this->playerStatistics->birdiesByYear($playerId, $year);
	}
}
