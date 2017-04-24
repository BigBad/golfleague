<?php
/**
 * Created by PhpStorm.
 * User: mschmidt
 * Date: 4/22/2017
 * Time: 9:40 AM
 */

namespace GolfLeague\Storage\Team;

use \Teammatch as Teammatch;

use GolfLeague\Storage\Team\TeamMatchesRepository;

class EloquentTeamMatchesRepository implements TeamMatchesRepository
{
    private $teamMatch;

    public function __construct(Teammatch $teamMatch)
    {
        $this->teamMatch = $teamMatch;
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }

    public function create($input)
    {
        // TODO: Implement create() method.
    }

    public function update($team)
    {
        // TODO: Implement update() method.
    }

    public function getByMatch($matchId)
    {
        return $this->teamMatch->where('match_id', '=', $matchId)->get();
    }
}
