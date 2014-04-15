<?php

class Match extends Eloquent 
{
	protected $table = 'matches';
	
	public function season()
    {
        return $this->belongsTo('Season');
    }
	
	public function course()
    {
        return $this->belongsTo('Course');
    }
	
}
