<?php

class Game extends Eloquent {
	
	public function winners()
    {
        return $this->hasMany('Winner');
    }
}