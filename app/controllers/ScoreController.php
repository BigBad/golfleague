<?php

class ScoreController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function view()
    {
		$view = View::make('EnterScores');
        return $view;
    }

        /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        return Input::all();
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