<?php

class Player extends Eloquent
{

	public function rounds()
    {
        return $this->hasMany('Round');
    }

	public function holescores()
	{
		return $this->hasManyThrough('Holescore','Round');
	}

	public function skins()
    {
        return $this->hasMany('Skin');
    }

	public function winners()
    {
        return $this->hasMany('Winner');
    }

	public function matches()
    {
        return $this->belongsToMany('Match')->withPivot('level_id', 'group', 'handicap', 'winnings')->withTimestamps();
    }

    public function teams()
    {
        return $this->hasMany('Team');
    }

}
