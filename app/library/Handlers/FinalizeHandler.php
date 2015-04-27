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


        $ctpWinners = Ctp::where('match_id', '=', $match->id)->get();
		$winningPlayers = $this->playerMoneyCombine($ctpWinners, $winningPlayers);

        $netWinners = Netwinner::where('match_id', '=', $match->id)->get();
		$winningPlayers = $this->playerMoneyCombine($netWinners, $winningPlayers);

        $grossWinners = Grosswinner::where('match_id', '=', $match->id)->get();
		$winningPlayers = $this->playerMoneyCombine($grossWinners, $winningPlayers);

        $skinWinners = Skin::where('match_id', '=', $match->id)->get();
		$winningPlayers = $this->playerMoneyCombine($skinWinners, $winningPlayers);

        foreach ($winningPlayers as $key => $player){
			$currentPlayer = Player::find($player['player_id']);
			$attributes = array(
				"winnings" => $player['money']
			);
			$currentPlayer->matches()->updateExistingPivot($match->id, $attributes); //save match_player pivot data
		}// End foreach


    }

	private function playerMoneyCombine($winners, $winningPlayers){
		$i = 1;
		foreach($winners as $key => $winner){
            $playerExists = $this->recursive_array_search($winner->player_id, $winningPlayers);
            //if player is already there add money here to other money
            if($playerExists){
                $winningPlayers[$i]['player_id'] = $winner->player_id;
                $winningPlayers[$i]['money'] = ($winner->money + $winningPlayers[$playerExists]['money']);
                unset($winningPlayers[$playerExists]);
            }
            else{
                $winningPlayers[$i]['player_id'] = $winner->player_id;
                $winningPlayers[$i]['money'] = $winner->money;
            }
            $i++;
        }
		return $winningPlayers;

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
            if($needle===$value OR (is_array($value) && $this->recursive_array_search($needle,$value) !== false)) {
                return $current_key;
            }
        }
        return false;
    }
}
