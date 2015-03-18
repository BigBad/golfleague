<?php namespace GolfLeague\Storage\HoleScore;

use \Holescore as Holescore;
use \Player as Player;

class EloquentHoleScoreRepository implements HoleScoreRepository
{
  /*Return Score collections that include:
   * Player Name
   * Date
   * Total
   * Course
   * Multideminsional Array of Hole Numbers and scores
   **/
	public function __construct(Holescore $holescore)
    {
        $this->holescore = $holescore;
    }

    public function all()
    {
        return $this->holescore->all();
    }

    //Find Scores by Player Id
    public function find($id)
    {
        //return Round::with('player', 'holescores')->where('player_id', '=', $playerId)->get();
    }

    public function create($input)
    {
        $this->holescore->create($input);
    }

	public function update($id, $score)
	{
		$holescore = Holescore::find($id);
		$holescore->score = $score;
		$holescore->save();
	}
}
