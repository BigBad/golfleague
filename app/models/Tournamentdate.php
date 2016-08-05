<?php


class Tournamentdate extends Eloquent {

	protected $table = 'tournamentdates';
	protected $fillable = ['date'];

	public function setDateAttribute($date)
	{
		$this->attributes['date'] = date('Y-m-d', strtotime(str_replace('-', '/', $date)));
	}

	public function tournament()
	{
		return $this->belongsTo('Tournament');
	}

}