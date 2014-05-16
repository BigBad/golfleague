<?php

class Hole extends Eloquent 
{
	public function courses()
    {
        return $this->belongsTo('Course');
    }
	
	public function holescores()
    {
        return $this->hasMany('Holescore');
    }
}
