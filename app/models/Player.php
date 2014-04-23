<?php

class Player extends Eloquent
{
    public function seasons()
    {
        return $this->hasMany('Season');
    }
	
	public function score()
    {
        return $this->hasMany('Score');
    }
	
	public function team()
    {
        return $this->belongsTo('Team');
    }

    public function single()
    {
        return $this->belongsTo('Single');
    }	
	
	
}
