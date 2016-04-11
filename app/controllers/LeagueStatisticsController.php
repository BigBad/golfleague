<?php

use GolfLeague\Statistics\League\LeagueStatistics as LeagueStatistics;

class LeagueStatisticsController extends \BaseController {

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
		return View::make('leagueStatistics');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return $this->leagueStatistics{$id}(Input::get('year'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return $id;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function netScores()
	{
		return $this->leagueStatistics->netCumulativeByPlayer(2);
		//return $this->leagueStatistics->netScoresByPlayerTop(2,5);
		//return $this->leagueStatistics->netScoresByPlayer(1);
	}

	public function netScoresLeague()
	{
		return $this->leagueStatistics->netScoresLeague();
	}

	public function netScoresLeagueTop($top)
	{
		return $this->leagueStatistics->netScoresLeagueTop($top);
	}

	public function netCumulativeByPlayer($playerId)
	{
		return $this->leagueStatistics->netCumulativeByPlayer($playerId);
	}

	public function netCumulative()
	{
		return $this->leagueStatistics->netCumulative();
	}

	public function netCumulativeByPlayerTop($playerId, $top)
	{
		return $this->leagueStatistics->netCumulativeByPlayerTop($playerId, $top);
	}

	public function netCumulativeTop($top)
	{
		$data['data'] = $this->leagueStatistics->netCumulativeTop($top);
		return $data;
	}

	public function netCumulativeTopYear($top, $year)
	{
		$data['data'] = $this->leagueStatistics->netCumulativeTopYear($top, $year);
		return $data;
	}

}
