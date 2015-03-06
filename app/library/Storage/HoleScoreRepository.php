<?php namespace GolfLeague\Storage\HoleScore;



interface HoleScoreRepository {

  public function all();
  public function find($id);
  public function create($input);

}