<?php

class Hole extends Eloquent 
{
	public function course()
    {
        return $this->belongsTo('Course');
    }
}
