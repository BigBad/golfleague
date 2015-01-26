<?php

class Score extends Eloquent
{

    public function player()
    {
        return $this->belongsTo('Player');
    }

    public function holescores()
    {
        return $this->hasMany('Holescore');
    }

    public function course()
    {
        return $this->holescores->course;
    }

}
