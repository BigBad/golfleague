<?php

class Ctp extends Eloquent
{
	public function match()
    {
        return $this->belongsTo('Match');
    }

    public function player()
    {
        return $this->belongsTo('Player');
    }

    public function hole()
    {
        return $this->belongsTo('Hole');
    }

}