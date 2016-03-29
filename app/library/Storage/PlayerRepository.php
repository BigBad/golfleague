<?php namespace GolfLeague\Storage\Player;



interface PlayerRepository {

  public function all();
  public function find($playerId);
  public function create($name, $handicap);

}