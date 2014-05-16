<?php

class Score extends Eloquent
{

	public function players()
    {
        return $this->belongsTo('Player');
    }

	public function holescores()
    {
        return $this->belongsTo('Holescore');
    }


}
