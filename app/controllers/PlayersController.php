<?php

class PlayersController extends \BaseController {

    public function __construct(Player $player)
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
        $operation = Input::get('oper');
        switch ($operation) {
        case "add":
            $this->player->name = Input::get('name');
            $this->player->save();            
            break;
        case "edit":
            $id = Input::get('id');
            $this->player = $this->player->find($id);
            $this->player->name = Input::get('name');
            $this->player->save();
            break;
        case "del":
            $id = Input::get('id');
            $this->player = $this->player->destroy($id);
            break;
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
        //
    }

}