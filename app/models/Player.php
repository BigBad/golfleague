<?php

class Player extends Eloquent 
{
        public function scores()
    {
        return $this->hasMany('Score');
    }
}
