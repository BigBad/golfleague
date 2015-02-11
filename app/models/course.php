<?php

class Course extends Eloquent 
{
	public function rounds()
    {
        return $this->hasMany('Round');
    }
	
	public function holes()
    {
        return $this->hasMany('Hole');
    }
	
	public function match()
    {
        return $this->hasOne('Match');
    }
	
}
