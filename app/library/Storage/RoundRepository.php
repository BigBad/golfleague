<?php namespace GolfLeague\Storage\Round;



interface RoundRepository {

  public function all();
  public function find($id);
  public function findByPlayer($playerId);
  public function findByMatch($matchId);
  public function create($input);
  public function update($round);

}