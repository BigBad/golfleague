<?php namespace GolfLeague\Storage\Skin;



interface SkinRepository {

    public function all();
    public function find($id);
    public function findByPlayer($playerId);
    public function findByMatch($matchId);
    public function create($input);
    public function update($round);

}