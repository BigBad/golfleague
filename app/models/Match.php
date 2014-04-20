<?php

class Match extends Eloquent
{
	protected $table = 'matches';

	public function teams()
    {
        return $this->hasMany('Team');
    }

    public function singles()
    {
        return $this->hasMany('Single');
    }

}
