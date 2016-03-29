<?php

class Money extends Eloquent {

	protected $table = 'money';

	public function matches()
    {
        return $this->belongsTo('Match');
    }
}