<?php

class Match extends Eloquent
{
	protected $table = 'matches';

	public function course()
    {
        return $this->belongsTo('Course');
    }
	
	public function season()
    {
        return $this->belongsTo('Season');
    }
	
	public function teams()
    {
        return $this->hasMany('Team');
    }

    public function singles()
    {
        return $this->hasMany('Single');
    }	
		
	public function score()
    {
        return $this->belongsTo('Score');
    }
	
	public function teamPlayers()
    {
        return $this->hasManyThrough('Player', 'Team');
    }
	
	public function singlesPlayers()
    {
        return $this->hasManyThrough('Player', 'Single');
    }
	
	public function getAllMatches()
	{
		$matches = DB::table('matches')->get();
		return $matches;
	}
}
