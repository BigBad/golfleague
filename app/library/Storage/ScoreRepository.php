<?php namespace GolfLeague\Storage\Score;

 

interface ScoreRepository { 

  public function all();
  public function find($playerId);
  public function create($input);

}