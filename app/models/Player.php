<?php

class Player extends Eloquent
{
    public function teams()
    {
        return $this->hasMany('Team');
    }

    public function singles()
    {
        return $this->hasMany('Single');
    }

}
