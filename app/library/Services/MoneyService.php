<?php namespace GolfLeague\Services;

use GolfLeague\Storage\Match\MatchRepository;
use \Match;
use \Ctp;
use \Grosswinner;
use \Netwinner;
use \Skin;

use Illuminate\Events\Dispatcher;

/**
* MoneyService, containing all useful methods for business logic for money relating to a match
*/
class MoneyService
{

    // Containing our matchRepository to make all our database calls
    protected $matchRepo;

    /**
    * Loads our $matchRepo
    *
    * @param MatchRepository $matchRepo
    * @return MatchService
    */
    public function __construct()
    {

    }

    public function totalMatchMoney($matchId)
    {
        //get player id and money for ctp
        $results['ctps'] =  Ctp::with('player')->where('match_id', '=', $matchId)->get();
        $results['skins'] = Skin::with('player', 'hole')->where('match_id', '=', $matchId)->get();
        $results['netwinner'] = Netwinner::with('player')->where('match_id', '=', $matchId)->get();
        $results['grosswinner'] = Grosswinner::with('player')->where('match_id', '=', $matchId)->get();
        $results['moneylist'] = Match::with('players')->where('id', '=', $matchId)->get();
		return $results;
    }
}
