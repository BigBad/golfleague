<?php

class Hole extends Eloquent 
{
    protected $fillable = ['course_id', 'number', 'par', 'yards', 'handicap'];

    public function course()
    {
        return $this->belongsTo('Course');
    }
	
	public function holescores()
    {
        return $this->hasMany('Holescore');
    }
	
	public function courses()
    {
        return $this->hasManyThrough('Course','Holescore');
    }
}
