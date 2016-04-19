<?php

class Course extends Eloquent
{

    protected $fillable = ['id', 'name', 'rating', 'slope', 'par'];

    public function rounds()
    {
        return $this->hasMany('Round');
    }

	public function holes()
    {
        return $this->hasMany('Hole');
    }

	public function match()
    {
        return $this->hasMany('Match');
    }

}
