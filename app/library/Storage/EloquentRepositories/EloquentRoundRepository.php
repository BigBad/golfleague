<?php namespace GolfLeague\Storage\Round;

use \Round as Round;
use Carbon\Carbon;

class EloquentRoundRepository implements RoundRepository
{
  /*Return Score collections that include:
   * Player Name
   * Date
   * Total
   * Course
   * Multideminsional Array of Hole Numbers and scores   *
   **/

    public function __construct()
    {
        $this->today = Carbon::today()->toDateString();
    }

    public function all()
    {
        //return Round::all();

        $today = Carbon::today()->toDateString();
        $rounds = Round::where('date', '<', $this->today)
            ->get();
        return $rounds;
    }

    public function find($id)
    {
        return Round::find($id);
    }
    //Find Scores by Player Id

    public function findByPlayer($playerId)
    {
        return Round::with('player', 'holescores', 'course')
            ->where('player_id', '=', $playerId)
            ->where('date', '<', $this->today)
            ->get();
    }

    public function findByMatch($matchId)
    {
        return Round::with('player', 'holescores')->where('match_id', '=', $matchId)->get();
    }

    public function create($input)
    {
        return Round::create($input);
    }

    //pass this a round object and replace it in database
    public function update($round)
    {
        $updateRound = Round::find($round->id);
        $updateRound = $round;
        $updateRound->save();
    }
}
