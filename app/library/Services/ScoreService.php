<?php namespace GolfLeague\Services;

use GolfLeague\Storage\Match\MatchRepository;
use GolfLeague\Storage\HoleScore\HoleScoreRepository as HoleScoreRepo;
use \Player;
use \Match;
use Illuminate\Events\Dispatcher;

/**
* ScoreService, containing all useful methods for business logic for scoring a round
*/
class ScoreService
{

    // Containing our matchRepository to make all our database calls
    protected $matchRepo;

    /**
    * Loads our $matchRepo
    *
    * @param MatchRepository $matchRepo
    * @return MatchService
    */
    public function __construct(MatchRepository $matchRepo,
                                HoleScoreRepo $holeScoreRepo,
                                Player $player,
                                Match $match,
                                Dispatcher $events)
    {
        $this->matchRepo = $matchRepo;
        $this->holeScoreRepo = $holeScoreRepo;
        $this->player = $player;
        $this->match = $match;
        $this->events = $events;
    }

    public function update($id, $score)
    {
        $this->holeScoreRepo->update($id, $score);
    }
}
