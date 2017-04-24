<?php

use GolfLeague\Services\MatchService as MatchService;
use GolfLeague\Storage\Match\MatchRepository as MatchRepository;
use Carbon\Carbon;

class MatchesController extends \BaseController {


    public function __construct(MatchService $match, MatchRepository $matchRepo)
    {
        $this->match = $match;
		$this->matchRepo = $matchRepo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->matchRepo->all();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$view = View::make('creatematch');
        return $view;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $input = Input::all();
		return $this->match->create($input);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $this->matchRepo->get($id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $enterView = 'EnterTeamMatch';
	    $data = $this->match->get($id);
        $view = View::make($enterView, $data);
        return $view;

	    // Logic to allow editable for day of match only
		$today = Carbon::today();

        $teamMatchDate = new Carbon('first day of January 2017');
		$matchDate = new Carbon($data['date']);

		if($matchDate >= $teamMatchDate){
		    $enterView = 'EnterTeamMatch';
        }

		if($today <= $matchDate){
			//Show Editable View
			$view = View::make($enterView, $data);
			return $view;
		}
		else {
			//Show Readonly View
			$view = View::make('ViewMatch', $data);
			return $view;
		}
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
		return $this->matchRepo->delete($id);
	}

}
