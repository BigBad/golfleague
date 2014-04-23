<?php

class Point extends Eloquent 
{
	public function player()
    {
        return $this->belongsTo('Player');
    }
	
	public function match()
    {
        return $this->belongsTo('Match');
    }
	
	public function season()
    {
        return $this->hasManyThrough('Season', 'Match');
    }
	
}