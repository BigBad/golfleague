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
use Illuminate\Events\Dispatcher;
use \Teammatch;

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
                                Teammatch $teammatch,
                                Dispatcher $events)
    {
        $this->matchRoundRepo = $matchRoundRepo;
        $this->matchRepo = $matchRepo;
        $this->prizeMoney = $prizeMoney;
        $this->player = $player;
        $this->match = $match;
        $this->ctp = $ctp;
        $this->teammatch = $teammatch;
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
        $this->events->fire('match.create', array($matchdata));  // MatchHandler and teamMatchHandler are listening...

        // Run for team Matches
        if($matchdata['matchType'] === 'team' || $matchdata['matchType'] === 'both'){

            foreach ($matchdata['teamMatchUp1'] as $teamKey => $team){
                $matchUp1[] = $this->search($matchdata['player'], 'team', $team);
            }

            //Save matchUp 1
            $match1['match_id'] = $matchdata['match_id'];  // This is generated below and passed to listener
            $match1['team_id'] = $matchUp1[0][0]['team'];
            $match1['player1'] = $matchUp1[0][0]['player_id'];
            $match1['player2'] = $matchUp1[0][1]['player_id'];
            $match1['opponent'] = $matchUp1[1][0]['team'];
            $this->teammatch->create($match1); //save to match table

            $match1['match_id'] = $matchdata['match_id'];  // This is generated below and passed to listener
            $match1['team_id'] = $matchUp1[1][0]['team'];
            $match1['player1'] = $matchUp1[1][0]['player_id'];
            $match1['player2'] = $matchUp1[1][1]['player_id'];
            $match1['opponent'] = $matchUp1[0][0]['team'];
            $this->teammatch->create($match1); //save to match table


            foreach ($matchdata['teamMatchUp2'] as $teamKey => $team){
                $matchUp2[] = $this->search($matchdata['player'], 'team', $team);
            }

            //Save matchUp 2
            $match2['match_id'] = $matchdata['match_id'];  // This is generated below and passed to listener
            $match2['team_id'] = $matchUp2[0][0]['team'];
            $match2['player1'] = $matchUp2[0][0]['player_id'];
            $match2['player2'] = $matchUp2[0][1]['player_id'];
            $match2['opponent'] = $matchUp2[1][0]['team'];
            $this->teammatch->create($match2); //save to match table

            $match2['match_id'] = $matchdata['match_id'];  // This is generated below and passed to listener
            $match2['team_id'] = $matchUp2[1][0]['team'];
            $match2['player1'] = $matchUp2[1][0]['player_id'];
            $match2['player2'] = $matchUp2[1][1]['player_id'];
            $match2['opponent'] = $matchUp2[0][0]['team'];
            $this->teammatch->create($match2); //save to match table


            foreach ($matchdata['teamMatchUp3'] as $teamKey => $team){
                $matchUp3[] = $this->search($matchdata['player'], 'team', $team);
            }

            //Save matchUp 3
            $match3['match_id'] = $matchdata['match_id'];  // This is generated below and passed to listener
            $match3['team_id'] = $matchUp3[0][0]['team'];
            $match3['player1'] = $matchUp3[0][0]['player_id'];
            $match3['player2'] = $matchUp3[0][1]['player_id'];
            $match3['opponent'] = $matchUp3[1][0]['team'];
            $this->teammatch->create($match3); //save to match table

            $match3['match_id'] = $matchdata['match_id'];  // This is generated below and passed to listener
            $match3['team_id'] = $matchUp3[1][0]['team'];
            $match3['player1'] = $matchUp3[1][0]['player_id'];
            $match3['player2'] = $matchUp3[1][1]['player_id'];
            $match3['opponent'] = $matchUp3[0][0]['team'];
            $this->teammatch->create($match3); //save to match table

        }
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



    private function search($array, $key, $value)
    {
        $results = array();
        if (is_array($array)) {
            if (isset($array[$key]) && $array[$key] == $value) {
                $results[] = $array;
            }
            foreach ($array as $subarray) {
                $results = array_merge($results, $this->search($subarray, $key, $value));
            }
        }
        return $results;
    }
}
