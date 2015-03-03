<?php namespace GolfLeague\Services;

use GolfLeague\Storage\Match\MatchRepository;
use GolfLeague\Storage\MatchRound\MatchRoundRepository;
use GolfLeague\Storage\Round\RoundRepository;

/**
* Our MatchService, containing all useful methods for business logic around Matches
*/
class MatchRoundService
{
    // Containing our pokemonRepository to make all our database calls to
    protected $matchRepo;

    /**
    * Loads our $matchRepo
    *
    * @param MatchRepository $matchRepo
    * @return MatchService
    */
    public function __construct(MatchRoundRepository $matchRoundRepo, RoundRepository $roundRepo, MatchRepository $match)
    {
        $this->matchRoundRepo = $matchRoundRepo;
        $this->roundRepo = $roundRepo;
        $this->match = $match;
    }

    public function all()
    {
        return $this->matchRoundRepo->all();
    }
    /**
    * Method to get match data from input Match id
    *
    * @param mixed $matchdata
    * @return JSON object
    */
    public function getByMatch($matchId)
    {
        return $this->matchRoundRepo->getByMatch($matchId);
    }

    public function getByMatchAndGroup($matchdata)
    {
        //Retrieve players in group
        $players = $this->matchRoundRepo->matchGroup($matchdata['match_id'], $matchdata['group']);
        return $players;
    }

    public function getMatchData($matchid)
    {
        return $this->match->getMatchData($matchid);
    }
}
