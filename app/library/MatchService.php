<?php namespace GolfLeague\Services;

use GolfLeague\Storage\Match\MatchRepository;
use GolfLeague\PrizeMoney;
use \Player;
use \Match;
/**
* Our MatchService, containing all useful methods for business logic around Matches
*/
class MatchService
{
    // Containing our pokemonRepository to make all our database calls to
    protected $matchRepo;

    /**
    * Loads our $matchRepo
    *
    * @param MatchRepository $matchRepo
    * @return MatchService
    */
    public function __construct(MatchRepository $matchRepo, PrizeMoney $prizeMoney, Player $player, Match $match)
    {
        $this->matchRepo = $matchRepo;
        $this->prizeMoney = $prizeMoney;
        $this->player = $player;
        $this->match = $match;
    }

    /**
    * Method to create match from input Match data
    *
    * @param mixed $matchdata
    * @return
    */
    public function create($matchdata)
    {
        //calculate money with purse
        $this->prizeMoney->setPurse($matchdata['purse']);

        $matchdata['purse'] = number_format($matchdata['purse'], 2);
        $matchdata['grossmoney'] = $this->prizeMoney->getlowScore();
        $matchdata['netmoney'] = $this->prizeMoney->getlowScore();
        $matchdata['skinsamoney'] = $this->prizeMoney->getSkins();
        $matchdata['skinsbmoney'] = $this->prizeMoney->getSkins();

        //append current handicap and set winnings to 0 for each player
        foreach ($matchdata['player'] as $key=>$player) {
            //get each player's current handicap
            $currentPlayer = $this->player->find($player['player_id']);
            $matchdata['player'][$key]['handicap'] = $currentPlayer->handicap;
            $matchdata['player'][$key]['winnings'] = 0;
        }// End foreach

        $this->matchRepo->create($matchdata);
    }

    /**
    * Method to get match from input Match data
    *
    * @param mixed $matchdata
    * @return JSON object
    */
    public function get($matchdata)
    {
        $match =  $this->match->find($matchdata['match_id']);
        return $match->players;
        return $matchdata;
    }
}
