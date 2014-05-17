<?php

class Single extends Eloquent
{
    public function match()
    {
        return $this->belongsTo('Match');
    }

	public function players()
    {
        return $this->hasMany('Player');
    }
}