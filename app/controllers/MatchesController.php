<?php

class MatchesController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function view()
    {
        $view = View::make('Matches');
        return $view;
    }

    /**
   
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