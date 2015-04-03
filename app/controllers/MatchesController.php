<?php

use GolfLeague\Services\MatchService as MatchService;
use GolfLeague\Storage\Match\MatchRepository as MatchRepository;

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
		$data = $this->match->get($id);

		if($data['date'] === date('Y-m-d')){
			//Show Editable View
			$view = View::make('EnterMatch', $data);
			return $view;
		}
		else {
			//Show Readonly View //This needs created
			$view = View::make('EnterMatch', $data);
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
