<?php

class Ctp extends Eloquent
{
	protected $guarded = ['id'];
	protected $fillable = ['player_id', 'hole_id', 'match_id', 'money'];

	public function match()
    {
        return $this->belongsTo('Match');
    }

    public function player()
    {
        return $this->belongsTo('Player');
    }

    public function hole()
    {
        return $this->belongsTo('Hole');
    }

}