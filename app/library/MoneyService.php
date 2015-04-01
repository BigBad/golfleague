<?php namespace GolfLeague\Services;

use GolfLeague\Storage\Match\MatchRepository;
use \Match;
use \Ctp;
use \Grosswinner;
use \Netwinner;
use \Skin;

use Illuminate\Events\Dispatcher;

/**
* ScoreService, containing all useful methods for business logic for scoring a round
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
        $ctps = Ctp::where('match_id', '=', $matchId)->get();
        $skins = Skin::where('match_id', '=', $matchId)->get();
        $netWinners = Netwinner::where('match_id', '=', $matchId)->get();
        $grossWinners = Grosswinner::where('match_id', '=', $matchId)->get();

    }

}
