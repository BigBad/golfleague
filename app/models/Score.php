<?php

class Score extends Eloquent
{

	public function player()
    {
        return $this->belongsTo('Player');
    }

	public function holescore()
    {
        return $this->hasMany('Holescore');
    }	
}

