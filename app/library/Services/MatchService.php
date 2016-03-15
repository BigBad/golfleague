<?php namespace GolfLeague\Services;

use GolfLeague\Storage\Match\MatchRepository;
use GolfLeague\Storage\MatchRound\MatchRoundRepository;
use GolfLeague\PrizeMoney;
use GolfLeague\Handicap;
use \Player;
use \Match;
use \GolfLeague\Storage\Ctp\CtpRepository;
use \Grosswinner;
use \Netwinner;
use \Skin;
use GolfLeague\Services\CarryOver;
use GolfLeague\Services\Purse;
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
    public function __construct(MatchRoundRepository $matchRoundRepo,
                                MatchRepository $matchRepo,
                                PrizeMoney $prizeMoney,
                                Player $player,
                                Match $match,
                                CtpRepository $ctp,
                                Dispatcher $events,
                                Purse $purse)
    {
        $this->matchRoundRepo = $matchRoundRepo;
        $this->matchRepo = $matchRepo;
        $this->prizeMoney = $prizeMoney;
        $this->player = $player;
        $this->match = $match;
        $this->ctp = $ctp;
        $this->events = $events;
        $this->purse = $purse;
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
        $this->purse->setPurse($matchdata['purse']);
        echo $this->purse->getPurse();  exit();
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
        //check for carry over money and if there is add it to skins money
        $carryOver = new CarryOver;
        $carryOverMoney = $carryOver->calculate();
        $matchdata['skinsamoney'] +=  $carryOverMoney[1];
        $matchdata['skinsbmoney'] +=  $carryOverMoney[2];

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
        // post CTP1 and CTP2
        $ctp1 = array(
            'match_id' => $matchdata['match'],
            'player_id' => $matchdata['ctp1'],
            'hole_id' => $matchdata['ctp1hole'],
            'money' => $this->prizeMoney->getCtp()
        );
        $this->ctp->create($ctp1);
        $ctp2 = array(
            'match_id' => $matchdata['match'],
            'player_id' => $matchdata['ctp2'],
            'hole_id' => $matchdata['ctp2hole'],
            'money' => $this->prizeMoney->getCtp()
        );
        $this->ctp->create($ctp2);

        //calculate Gross winner and post to grossWinnersTable

        $matchRound = $this->matchRoundRepo->getByMatch($matchdata['match']);


        $lowGross = array();
        foreach ($matchRound as $key => $match){
            $lowGross[$match['player']->id] = $match['score'];
        }
        $arrayLowGross = array_keys($lowGross, min($lowGross));
        foreach($arrayLowGross as $key => $lowgrossPlayer) {
            $grossWinner = new Grosswinner;
            $grossWinner->player_id = $lowgrossPlayer;
            $grossWinner->match_id = $matchdata['match'];
            $grossWinner->score = $lowGross[$lowgrossPlayer];
            $grossWinner->money = $this->prizeMoney->getlowScore() / count($arrayLowGross);
            $grossWinner->save();
        }

        //Calculate NET winner
        $lowNet = array();
        $scores =array();
        foreach ($matchRound as $key => $match){
            $netScore = ($match['score'] - round($match['player']->handicap,0)); //calculate net score
            $lowNet[$match['player']->id] = $netScore;
        }
        $arrayLowNet = array_keys($lowNet, min($lowNet));

        foreach($arrayLowNet as $key => $lownetPlayer) {
            $netWinner = new Netwinner;
            $netWinner->player_id = $lownetPlayer;
            $netWinner->match_id = $matchdata['match'];
            $netWinner->score = $lowNet[$lownetPlayer];
            $netWinner->money = $this->prizeMoney->getlowScore() /  count($arrayLowNet);
            $netWinner->save();
        }

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

        //Need to add Carry over money if there no skins are won
        //check for carry over money
        $skinsamoney = $match->skinsamoney; // + carryover A money if any
        $skinsbmoney = $match->skinsbmoney; // + carryover B money if any

        if($aSkinsWon > 0) {
            $moneyperskinA = $skinsamoney / $aSkinsWon;

            $aSkins = Skin::where('match_id', '=', $matchdata['match'])->where('level_id', '=', 1)->get();
            foreach ($aSkins as $askin){
                $askin->money = $moneyperskinA;
                $askin->save();
            }
        }

        if($bSkinsWon > 0) {
            $moneyperskinB = $skinsbmoney / $bSkinsWon;

            $bSkins = Skin::where('match_id', '=', $matchdata['match'])->where('level_id', '=', 2)->get();
            foreach ($bSkins as $bskin){
                $bskin->money = $moneyperskinB;
                $bskin->save();
            }
        }
        //foreach player in pivot table create player and run handicap analysis
        foreach($match->players as $matchplayer)
        {
            $player = Player::find($matchplayer->pivot->player_id);
            $handicap = new Handicap($player);
            $player->handicap = $handicap->calculate();
            $player->save();
        }

        //Fire event to calculate money won and add to pivot table match_player
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
