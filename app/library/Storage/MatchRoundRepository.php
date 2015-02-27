<?php namespace GolfLeague\Storage\MatchRound;



interface MatchRoundRepository {

  public function all();
  public function getByMatch($matchId);
  public function create($input);
}
