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

	public function levels()
    {
        return $this->belongsTo('Level');
    }

	public function holes()
    {
        return $this->belongsTo('Hole');
    }
}