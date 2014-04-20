<?php

class Single extends Eloquent
{
    public function match()
    {
        return $this->belongsTo('Match');
    }

    public function player()
    {
        return $this->belongsTo('Player');
    }
}