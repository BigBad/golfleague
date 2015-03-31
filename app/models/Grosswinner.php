<?php

class Grosswinner extends Eloquent {

	public function matches()
    {
        return $this->belongsTo('Match');
    }

    public function players()
    {
        return $this->belongsTo('Player');
    }

}