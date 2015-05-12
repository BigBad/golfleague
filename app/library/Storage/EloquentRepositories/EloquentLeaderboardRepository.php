<?php namespace GolfLeague\Storage\Leaderboard;

use \Match as Match;

class EloquentLeaderboardRepository implements LeaderboardRepository
{

	public function __construct(Match $match)
    {
        $this->match = $match;
    }

    public function get($year)
    {
        //Get all match ids for a given year
		//get all player ids
		//for each player id get total winnings from pivot where (player id and match id)
		$year = $year . '-01-01';
		$matches = $this->match->with('players')->where('created_at', '>', $year)->get(); //get match eventually by year

		//filter out players from match
		$moneyList = array();
		$players = array();
		foreach($matches as $key => $item){
			$players = $item->players;
			foreach($players as $playersKey => $player){
				if (array_key_exists($player->id, $moneyList)) {
					//add previois to new
					$moneyList[$player->id]['winnings'] = sprintf('%01.2f', ($moneyList[$player->id]['winnings'] + $player->pivot->winnings));
				}
				else {
					$moneyList[$player->id]['id'] = $player->id;
					$moneyList[$player->id]['name'] = $player->name;
					$moneyList[$player->id]['winnings'] = sprintf('%01.2f',$player->pivot->winnings);
				}
			}
		}
		
		return $moneyList;
    }
}
