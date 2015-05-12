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
        //for the match get ctps, netwinner, grosswinner, and skins
        //calculate winnings
        //store in the pivot table match_player for the given player

        $winningPlayers = array();
        $i = 1;

        $ctpWinners = Ctp::where('match_id', '=', $match->id)->get();
        foreach($ctpWinners as $key => $ctpWinner){
            $playerExists = $this->recursive_array_search($ctpWinner->player_id, $winningPlayers);
            //if player is already there add money here to other money
            if($playerExists){
                $winningPlayers[$i]['player_id'] = $ctpWinner->player_id;
                $winningPlayers[$i]['money'] = ($ctpWinner->money + $winningPlayers[$playerExists]['money']);
            }
            else {
                $winningPlayers[$i]['player_id'] = $ctpWinner->player_id;
                $winningPlayers[$i]['money'] = $ctpWinner->money;
            }
            $i++;
        }

        $netWinners = Netwinner::where('match_id', '=', $match->id)->get();
        foreach($netWinners as $key => $netWinner){
            $playerExists = $this->recursive_array_search($netWinner->player_id, $winningPlayers);
            //if player is already there add money here to other money
            if($playerExists){
                $winningPlayers[$i]['player_id'] = $netWinner->player_id;
                $winningPlayers[$i]['money'] = ($netWinner->money + $winningPlayers[$playerExists]['money']);
                unset($winningPlayers[$playerExists]);
            }
            else{
                $winningPlayers[$i]['player_id'] = $netWinner->player_id;
                $winningPlayers[$i]['money'] = $netWinner->money;
            }
            $i++;
        }

        $grossWinners = Grosswinner::where('match_id', '=', $match->id)->get();
        foreach($grossWinners as $key => $grossWinner){
            $playerExists = $this->recursive_array_search($grossWinner->player_id, $winningPlayers);
            //if player is already there add money here to other money
            if($playerExists){
                $winningPlayers[$i]['player_id'] = $grossWinner->player_id;
                $winningPlayers[$i]['money'] = ($grossWinner->money + $winningPlayers[$playerExists]['money']);
                unset($winningPlayers[$playerExists]);
            }
            else{
                $winningPlayers[$i]['player_id'] = $grossWinner->player_id;
                $winningPlayers[$i]['money'] = $grossWinner->money;
            }
            $i++;
        }

        $skinWinners = Skin::where('match_id', '=', $match->id)->get();
        foreach($skinWinners as $key => $skinWinner){
            $playerExists = $this->recursive_array_search($skinWinner->player_id, $winningPlayers);
            //if player is already there add money here to other money
            if($playerExists){
                $winningPlayers[$i]['player_id'] = $skinWinner->player_id;
                $winningPlayers[$i]['money'] = ($skinWinner->money + $winningPlayers[$playerExists]['money']);
                unset($winningPlayers[$playerExists]);
            }
            else{
                $winningPlayers[$i]['player_id'] = $skinWinner->player_id;
                $winningPlayers[$i]['money'] = $skinWinner->money;
            }
            $i++;
        }

        //Consolidate any multiple instances of a player
        foreach ($winningPlayers as $key => $winningPlayer){
            array_search($winningPlayer['player_id'], $winningPlayers);
        }

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
