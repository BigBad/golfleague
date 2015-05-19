<?php

use GolfLeague\Statistics\League\LeagueStatistics as LeagueStatistics;


class ScoringAverageController extends \BaseController {

	public function __construct(LeagueStatistics $leagueStatistics)
    {
		$this->leagueStatistics = $leagueStatistics;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//may use for get all
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$results  = $this->leagueStatistics->topFiveScoringAverageByYear($id);
		$data['data'] = $results;
		return $data;
	}



}
