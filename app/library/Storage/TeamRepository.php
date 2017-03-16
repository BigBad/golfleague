<?php namespace GolfLeague\Storage\Team;



interface TeamRepository {

    public function all();
    public function find($id);
    public function create($input);
    public function update($team);
}