<?php

class Holescore extends Eloquent {

    protected $guarded = ['id'];
    protected $fillable = ['score', 'hole_id', 'round_id'];

    public function round()
    {
        return $this->belongsTo('Round');
    }

	public function hole()
    {
        return $this->belongsTo('Hole');
    }
}