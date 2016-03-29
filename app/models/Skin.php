<?php

class Skin extends Eloquent {

	public function player()
    {
        return $this->belongsTo('Player');
    }

	public function matches()
    {
        return $this->belongsTo('Match');
    }

	public function level()
    {
        return $this->belongsTo('Level');
    }

	public function hole()
    {
        return $this->belongsTo('Hole');
    }
}