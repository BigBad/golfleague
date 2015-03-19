<?php

class Match extends Eloquent
{
	protected $table = 'matches';

	public function setDateAttribute($date)
    {
		$this->attributes['date'] = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
    }

	public function course()
    {
        return $this->belongsTo('Course');
    }

	public function season()
    {
        return $this->belongsTo('Season');
    }

	public function winners()
    {
        return $this->hasMany('Winner');
    }

	public function money()
    {
        return $this->hasMany('Money');
    }

	public function skins()
    {
        return $this->hasMany('Skin');
    }

	public function players()
    {
        return $this->belongsToMany('Player')->withPivot('level_id', 'group', 'handicap', 'winnings')->withTimestamps();
    }

	public function rounds()
	{
		return $this->hasMany('Round');
	}

	public function getAllMatches()
	{
		$matches = DB::table('matches')->get();
		return $matches;
	}
}
