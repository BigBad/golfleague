<?php

class Holescore extends Eloquent {
	
	public function scores()
    {
        return $this->belongsTo('Score');
    }
	
	public function holes()
    {
        return $this->belongsTo('Hole');
    }
}