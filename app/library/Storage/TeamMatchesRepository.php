<?php
/**
 * Created by PhpStorm.
 * User: mschmidt
 * Date: 4/22/2017
 * Time: 9:39 AM
 */

namespace GolfLeague\Storage\Team;


interface TeamMatchesRepository
{
    public function all();
    public function findById($id);
    public function create($input);
    public function update($team);
    public function getByMatch($matchId);
}