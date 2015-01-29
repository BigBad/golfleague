<?php

class Holescore extends Eloquent {
	
	public function round()
    {
        return $this->belongsTo('Round');
    }
	
	public function hole()
    {
        return $this->belongsTo('Hole');
    }
}