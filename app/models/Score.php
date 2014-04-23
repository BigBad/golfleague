<?php

class Score extends Eloquent 
{
	
	public function player()
    {
        return $this->belongsTo('Player');
    }
	
	public function match()
    {
        return $this->belongsTo('Match');
    }
	
	public function courses()
    {
        return $this->hasManyThrough('Course', 'Match');
    }
	
}
