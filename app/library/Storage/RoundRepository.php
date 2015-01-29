<?php namespace GolfLeague\Storage\Round;

 

interface RoundRepository { 

  public function all();
  public function find($playerId);
  public function create($input);

}