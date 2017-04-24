<?php namespace GolfLeague\Storage\Team;



interface TeamRepository {

    public function all();
    public function findById($id);
    public function findByYear($year);
    public function create($input);
    public function update($team);
}