<?php namespace GolfLeague\Storage\Team;

use \Team as Team;

class EloquentTeamRepository implements TeamRepository
{
    private $team;

    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function all()
    {
        return $this->team->all();
    }
    public function findById($id)
    {
        return $this->team->where('id', '=', $id)->get();
    }

    public function findByYear($year)
    {
        return $this->team->whereYear('created_at', '=', $year)->get();
    }

    public function create($input)
    {
        $this->team->create($input);
    }

    public function update($team)
    {
        $updateTeam = $this->team->where('id', '=', $id)->get();
        $updateTeam = $team;
        $updateTeam->save();
    }

}