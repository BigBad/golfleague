<?php

namespace GolfLeague\Handlers;

use GolfLeague\Storage\Round\RoundRepository;
use \Ctp;
use \Netwinner;
use \Grosswinner;
use \Skin;
use \Player;

/**
 * MatchHandler Connection Class
 *
 * This class subscribes to events in related to match creation
 *
 * @author          Michael Schmidt
 */
class FinalizeHandler
{
    /**
     * Create a new instance of the MatchHandler
     *
     * @param  GolfLeague\Storage\Round\RoundRepository $roundRepo
     * @return void
     */
    public function __construct(RoundRepository $roundRepo)
    {
        $this->roundRepo= $roundRepo;
    } // End of __construct

    /**
     * Create an initial round for each player after a new match is created
     *
     * @param  Match $match
     * @return void
     */
    public function handle($match)
    {
        // For the match get ctps, netwinner, grosswinner, and skins
        // calculate winnings store in the pivot table
        // match_player for the given player

        $winningPlayers = array();

        $ctpWinners = Ctp::where('match_id', '=', $match->id)->get();
        $winningPlayers = $this->gameWinner($ctpWinners, $winningPlayers);

        $netWinners = Netwinner::where('match_id', '=', $match->id)->get();
        $winningPlayers = $this->gameWinner($netWinners, $winningPlayers);

        $grossWinners = Grosswinner::where('match_id', '=', $match->id)->get();
        $winningPlayers = $this->gameWinner($grossWinners, $winningPlayers);

        $skinWinners = Skin::where('match_id', '=', $match->id)->get();
        $winningPlayers = $this->gameWinner($skinWinners, $winningPlayers);

        //Consolidate money for any multiple instances of a player
        foreach ($winningPlayers as $key => $winningPlayer){
            array_search($winningPlayer['player_id'], $winningPlayers);
        }

        // update pivot table with winners data
        foreach ($winningPlayers as $key => $player){
            $currentPlayer = Player::find($player['player_id']);
            $attributes = array(
                "winnings" => $player['money']
            );
            $currentPlayer->matches()->updateExistingPivot($match->id, $attributes); //save match_player pivot data
        }// End foreach


    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('match.finalize', 'GolfLeague\Handlers\FinalizeHandler');
    }

    /*
     * Takes array of
     * @param array $gameWinner
     * @param array $winningPlayers
     */
    public function gameWinner($gameWinners, $winningPlayers)
    {
        $i = 1;
        foreach($gameWinners as $key => $gameWinner){
            $playerExists = $this->recursive_array_search($gameWinner->player_id, $winningPlayers);
            //if player is already there add money here to other money
            if($playerExists){
                $winningPlayers[$i]['player_id'] = $gameWinner->player_id;
                $winningPlayers[$i]['money'] = ($gameWinner->money + $winningPlayers[$playerExists]['money']);
                unset($winningPlayers[$playerExists]);
            }
            else {
                $winningPlayers[$i]['player_id'] = $gameWinner->player_id;
                $winningPlayers[$i]['money'] = $gameWinner->money;
            }
            $i++;
        }
        return $winningPlayers;
    }

    public function recursive_array_search($needle,$haystack) {
        foreach($haystack as $key=>$value) {
            $current_key=$key;
            if($needle===$value || (is_array($value) && $this->recursive_array_search($needle,$value) !== false)) {
                return $current_key;
            }
        }
        return false;
    }
}
