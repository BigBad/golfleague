<?php

class Round extends Eloquent
{
	protected $guarded = array('id');
	protected $fillable = array('date', 'player_id', 'course_id', 'match_id', 'score', 'esc');

	public function setDateAttribute($date)
    {
		$this->attributes['date'] = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
    }

    public function player()
    {
        return $this->belongsTo('Player');
    }

	public function course()
    {
        return $this->belongsTo('Course');
    }

    public function holescores()
    {
        return $this->hasMany('Holescore')->orderBy('id');
    }

    public function holes()
    {
        return $this->hasManyThrough('Hole','Holescore');
    }
}
