<?php namespace GolfLeague\Services;

use GolfLeague\Storage\Match\MatchRepository;
use GolfLeague\Storage\MatchRound\MatchRoundRepository;
use GolfLeague\PrizeMoney;
use GolfLeague\Games;
use \Player;
use \Match;
use \Ctp;
use \Grosswinner;
use \Netwinner;
use \Skin;
use Illuminate\Events\Dispatcher;

/**
* Our MatchService, containing all useful methods for business logic around Matches
*/
class MatchService
{
    // Containing our matchRepository to make all our database calls to
    protected $matchRepo;

    /**
    * Loads our $matchRepo
    *
    * @param MatchRepository $matchRepo
    * @return MatchService
    */
    public function __construct(Games $games,
                                MatchRoundRepository $matchRoundRepo,
                                MatchRepository $matchRepo,
                                PrizeMoney $prizeMoney,
                                Player $player,
                                Match $match,
                                Dispatcher $events)
    {
        $this->games = $games;
        $this->matchRoundRepo = $matchRoundRepo;
        $this->matchRepo = $matchRepo;
        $this->prizeMoney = $prizeMoney;
        $this->player = $player;
        $this->match = $match;
        $this->events = $events;
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

        //How many A and B players
        $totalPlayers = 0;
        $aPlayerCount = 0;
        $bPlayerCount = 0;
        foreach($matchdata['player'] as $player){
            if ($player['level_id'] == '1'){
                $aPlayerCount++;
            }
            else {
                $bPlayerCount++;
            }
            $totalPlayers++;
        }

        //Calculate Skins money based on how many players in each group
        $matchdata['skinsamoney'] = $this->prizeMoney->skinsGroupPot($matchdata['purse'], $totalPlayers, $aPlayerCount);
        $matchdata['skinsbmoney'] = $this->prizeMoney->skinsGroupPot($matchdata['purse'], $totalPlayers, $bPlayerCount);

        //append current handicap and set winnings to 0 for each player
        foreach ($matchdata['player'] as $key=>$player) {
            //get each player's current handicap
            $currentPlayer = $this->player->find($player['player_id']);
            $matchdata['player'][$key]['handicap'] = $currentPlayer->handicap;
            $matchdata['player'][$key]['winnings'] = 0;
        }// End foreach

        $matchid = $this->matchRepo->create($matchdata);
        $matchdata['match_id'] = $matchid;
        $this->events->fire('match.create', array($matchdata));
    }

    public function finalize($matchdata)
    {
        /*
		//return 'success';
        // post CTP1 and CTP2
        $ctp = new Ctp;
        $ctp->match_id = $matchdata['match'];
        $ctp->player_id = $matchdata['ctp1'];
        $ctp->hole_id = $matchdata['ctp1hole'];
        $ctp->money = $this->prizeMoney->getCtp();
        $ctp->save();

        $ctp = new Ctp;
        $ctp->match_id = $matchdata['match'];
        $ctp->player_id = $matchdata['ctp2'];
        $ctp->hole_id = $matchdata['ctp2hole'];
        $ctp->money = $this->prizeMoney->getCtp();
        $ctp->save();

        //calculate Gross winner and post to grossWinnersTable

        $matchRound = $this->matchRoundRepo->getByMatch($matchdata['match']);


        $lowGross = array();
        foreach ($matchRound as $key => $match){
            $lowGross[$key] = $match['score'];
        }
        $arrayLowGross = array_keys($lowGross, min($lowGross));
        $arrayKeyLowGross = $arrayLowGross[0];

        $grossWinner = new Grosswinner;
        $grossWinner->player_id = $matchRound[$arrayKeyLowGross]->player_id;
        $grossWinner->match_id = $matchdata['match'];
        $grossWinner->score = $matchRound[$arrayKeyLowGross]->score;
        $grossWinner->money = $this->prizeMoney->getlowScore();

        $grossWinner->save();


        //Calculate NET winner

        $lowNet = array();
        $scores =array();
        foreach ($matchRound as $key => $match){
            $netScore = ($match['score'] - round($match['player']->handicap,0));
            $lowNet[$key] = $netScore;
        }
        $arrayLowNet = array_keys($lowNet, min($lowNet));
        $arrayKeyLowNet = $arrayLowNet[0];

        $netWinner = new Netwinner;
        $netWinner->player_id = $matchRound[$arrayKeyLowNet]->player_id;
        $netWinner->match_id = $matchdata['match'];
        $netWinner->score = $lowNet[$arrayKeyLowNet];
        $netWinner->money = $this->prizeMoney->getlowScore();

        $netWinner->save();



        //Calculate Skins

        //determine A and B players
        //using pivot table match_player
        $match = $this->match->find($matchdata['match']);
        $aPlayers = array();
        $bPlayers = array();
        foreach($match->players as $player)
        {
            if($player->pivot->level_id == 1){
                $aPlayers[] = $player->pivot->player_id;

            }
            if($player->pivot->level_id == 2){
                $bPlayers[] = $player->pivot->player_id;
            }
        }

        //Create Skins arrays
        //player_id, 'holescores'
        foreach($matchRound as $key => $round) {
            if (in_array($round->player_id,$aPlayers)){
                $aPlayersSkins[$key]['player_id'] = $round->player_id;
                $aPlayersSkins[$key]['holescores'] = $round->holescores;
            }
            if (in_array($round->player_id,$bPlayers)){
                $bPlayersSkins[$key]['player_id'] = $round->player_id;
                $bPlayersSkins[$key]['holescores'] = $round->holescores;
            }
        }

        //Run A Skins analysis
        $scores = array();
        foreach($aPlayersSkins as $key => $playerSkin){
            foreach($playerSkin['holescores'] as $hole => $holescore){
                $scores[$holescore['hole_id']][$playerSkin['player_id']] = $holescore['score'];
            }
        }

        foreach($scores as $hole_id => $hole) {
            $minScore = min($hole);
            $winners[$hole_id] = array_keys($hole, min($hole)); //gets player id of lowest score
        }
        $aSkinsWon = 0;
        foreach($winners as $key => $winner) {
            if(count($winner)  ===  1) {
                //post to DB
                $skinWinner = new Skin;
                $skinWinner->player_id = $winner[0];
                $skinWinner->level_id = 1;
                $skinWinner->match_id = intval($matchdata['match']);
                $skinWinner->hole_id = $key;
                $skinWinner->save();
                $aSkinsWon++;
            }
        }

        //Run B Skins analysis
        $scores = array();
        foreach($bPlayersSkins as $key => $playerSkin){
            foreach($playerSkin['holescores'] as $hole => $holescore){
                $scores[$holescore['hole_id']][$playerSkin['player_id']] = $holescore['score'];
            }
        }

        foreach($scores as $hole_id => $hole) {
            $minScore = min($hole);
            $winners[$hole_id] = array_keys($hole, min($hole)); //gets player id of lowest score
        }
        $bSkinsWon = 0;
        foreach($winners as $key => $winner) {
            if(count($winner)  ===  1) {
                //post to DB
                $skinWinner = new Skin;
                $skinWinner->player_id = $winner[0];
                $skinWinner->level_id = 2;
                $skinWinner->match_id = intval($matchdata['match']);
                $skinWinner->hole_id = $key;
                $skinWinner->save();
                $bSkinsWon++;
            }
        }



        $match =  Match::find($matchdata['match']);

        $skinsamoney = $match->skinsamoney;
        $skinsbmoney = $match->skinsbmoney;
        $moneyperskinA = $skinsamoney / $aSkinsWon;
        $moneyperskinB = $skinsbmoney / $bSkinsWon;

        $aSkins = Skin::where('match_id', '=', $matchdata['match'])->where('level_id', '=', 1)->get();
        foreach ($aSkins as $askin){
            $askin->money = $moneyperskinA;
            $askin->save();
        }

        $bSkins = Skin::where('match_id', '=', $matchdata['match'])->where('level_id', '=', 2)->get();
        foreach ($bSkins as $bskin){
            $bskin->money = $moneyperskinB;
            $bskin->save();
        }
*/
        //Fire event to calculate money won and add to pivot table match_player
		$match =  Match::find($matchdata['match']);
        $this->events->fire('match.finalize', $match);
    }

    /**
    * Method to get match from input Match data
    *
    * @param mixed $matchdata
    * @return JSON object
    */
    public function get($matchid)
    {
        $matchdata =  $this->matchRepo->get($matchid);
        return $matchdata;
    }



}
