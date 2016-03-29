<?php

use GolfLeague\Storage\Leaderboard\LeaderboardRepository as LeaderboardRepository;

class LeaderboardController extends \BaseController {

	public function __construct(LeaderboardRepository $leaderboardRepo)
    {
        $this->leaderboardRepo = $leaderboardRepo;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('leaderboard');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($year)
	{
		$results  = $this->leaderboardRepo->get($year);
		$newvalue = array_values( (array)$results );
		$data['data'] = $newvalue;
		return $data;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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


}
