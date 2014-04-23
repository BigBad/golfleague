<?php

class Season extends Eloquent 
{
	public function matches()
    {
        return $this->hasMany('Match');
    }
	
	public function players()
    {
        return $this->hasMany('Player');
    }
}
