<?php

class Player extends Eloquent
{

	public function scores()
    {
        return $this->hasMany('Score');
    }

	public function holescores()
	{
		return $this->hasManyThrough('Holescore','Score');
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
        return $this->belongsToMany('Match');
    }

}
