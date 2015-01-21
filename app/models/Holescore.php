<?php

class Holescore extends Eloquent {
	
	public function score()
    {
        return $this->belongsTo('Score');
    }
	
	public function hole()
    {
        return $this->belongsTo('Hole');
    }

}