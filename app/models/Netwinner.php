<?php

class Netwinner extends Eloquent {

	public function matches()
    {
        return $this->belongsTo('Match');
    }

    public function player()
    {
        return $this->belongsTo('Player');
    }

}