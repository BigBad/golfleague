<?php


class Tournament extends Eloquent {

	protected $table = 'tournaments';
	protected $fillable = ['name', 'number_of_weeks', 'purse', 'format'];

	public function dates()
	{
		return $this->hasMany('Tournamentdate');
	}

}