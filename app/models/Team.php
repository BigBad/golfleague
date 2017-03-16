<?php

class Team extends Eloquent
{
    protected $guarded = ['id'];
    protected $fillable = ['name'];

    public function players()
    {
        return $this->hasMany('Player');
    }
}