<?php

use GolfLeague\Storage\Player\PlayerRepository as PlayerRepo;

class PlayersController extends \BaseController {

    public function __construct(PlayerRepo $player)
    {
        $this->player = $player;
    }

	/**
	 * Get Data for all players
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->player->all();
	}

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
		$this->player->create(Input::get('name'), Input::get('handicap'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {

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