<?php namespace GolfLeague\Storage\Match;



interface MatchRepository {

  public function all();
  public function find($playerId);
  public function create($input);
  public function delete($matchId);
  public function getYears();
  public function getByDate($startDate, $endDate);

}