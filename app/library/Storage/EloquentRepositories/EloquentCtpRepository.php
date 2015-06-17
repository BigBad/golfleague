<?php namespace GolfLeague\Storage\Ctp;

use \Ctp as Ctp;

class EloquentCtpRepository implements CtpRepository
{
  /*Return Score collections that include:
   * Player Name
   * Date
   * Total
   * Course
   * Multideminsional Array of Hole Numbers and scores   *
   **/

    public function all()
    {
        return Ctp::all();
    }

    public function find($id)
    {
        return Ctp::find($id);
    }

    //Find Ctps by Player Id
    public function findByPlayer($playerId)
    {
        return Ctp::with('player', 'hole', 'match')->where('player_id', '=', $playerId)->get();
    }

    public function findByHole($holeId)
    {
        return Ctp::with('player', 'hole')->where('hole_id', '=', $holeId)->get();
    }

    public function findByMatch($matchId)
    {
        return Ctp::with('player', 'hole')->where('match_id', '=', $matchId)->get();
    }

    public function create($input)
    {
        return Ctp::create($input);
    }

    //pass this a Ctp Eloquent object and replace it in database
    public function update($ctp)
    {
        $updateCtp = Ctp::find($ctp->id);
        $updateCtp = $ctp;
        $updateCtp->save();
    }
}
