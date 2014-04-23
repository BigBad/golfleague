<?php

class Course extends Eloquent 
{
	public function holes()
    {
        return $this->hasMany('Hole');
    }
	
	public function match()
    {
        return $this->hasOne('Match');
    }
	
	public function score()
    {
        return $this->belongsTo('Score');
    }
	
	
	
}