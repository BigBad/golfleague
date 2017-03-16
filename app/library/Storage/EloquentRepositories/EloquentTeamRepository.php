<?php namespace GolfLeague\Storage\Team;

use \Team as Team;

class EloquentTeamRepository implements TeamRepository
{
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function all()
    {
        return $this->team->all();
    }
    public function find($id)
    {

    }
    public function create($input)
    {
        return 'Here';
    }
    public function update($team)
    {

    }

}