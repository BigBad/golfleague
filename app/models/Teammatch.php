<?php

class Teammatch extends Eloquent {

    protected $table = 'teammatches';
    protected $fillable = ['match_id', 'team_id', 'player1', 'player2', 'opponent'];

    public function match()
    {
        return $this->belongsTo('Match');
    }

    public function team()
    {
        return $this->belongsTo('Team');
    }

    public function player()
    {
        return $this->belongsTo('Player');
    }

}