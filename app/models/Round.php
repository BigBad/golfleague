<?php

class Round extends Eloquent
{

    public function player()
    {
        return $this->belongsTo('Player');
    }
	
	public function course()
    {
        return $this->belongsTo('Course');
    }

    public function holescores()
    {
        return $this->hasMany('Holescore');
    }

    public function holes()
    {
        return $this->hasManyThrough('Hole','Holescore');
    }
}