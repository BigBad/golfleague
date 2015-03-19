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


    public function find($id)
    {
        return Holescore::find($id);
    }

    public function create($input)
    {
        $this->holescore->create($input);
    }

	public function update($id, $score)
	{
		$holescore = $this->find($id);
		$holescore->score = $score;
		$holescore->save();
	}

	public function getByRound($roundId)
	{
		return $this->holescore->where('round_id', '=', $roundId)->orderBy('id', 'ASC')->get();
	}
}
