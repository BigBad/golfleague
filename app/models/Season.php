<?php

class Season extends Eloquent 
{
	public function matches()
    {
        return $this->hasMany('Match');
    }
	
}
