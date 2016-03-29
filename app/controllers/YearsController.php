<?php

use GolfLeague\Storage\Match\MatchRepository as MatchRepo;

class YearsController extends \BaseController {

	public function __construct(MatchRepo $matchRepo)
	{
		$this->matchRepo = $matchRepo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->matchRepo->getYears();
	}

}
