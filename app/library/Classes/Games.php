<?php

namespace GolfLeague;

class Games
{
	public function __construct()
    {

    }

	public function getGrossWinner()
	{
		return 'gross';
		//take an array of players and gross score
		//find lowest and return
        //for each score in a given round determine +/- for each
        //sort and return


	}

    public function getNetWinner()
    {
        //for each score in a given round determine +/- for each AFTER subtracting handicap

    }

    public function currentParTotal($courseId, $holesPlayed)
    {
        //find par total for course given unmber of holes played

    }
}