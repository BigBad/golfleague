<?php namespace GolfLeague\Storage\Ctp;



interface CtpRepository {

  public function all();
  public function find($id);
  public function findByPlayer($playerId);
  public function findByHole($holeId);
  public function findByMatch($matchId);
  public function create($input);
  public function update($ctp);
}