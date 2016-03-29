<?php

class Winner extends Eloquent {
	
	public function games()
    {
        return $this->belongsTo('Game');
    }
	
	public function players()
    {
        return $this->belongsTo('Player');
    }
	
	public function matches()
    {
        return $this->belongsTo('Match');
    }
}