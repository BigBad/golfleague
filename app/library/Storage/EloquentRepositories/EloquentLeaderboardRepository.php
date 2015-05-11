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
		$match = $this->match->with('players')->where('created_at', '>', $year)->get(); //get match eventually by year

		return $match;
		//filter out players from match
		$players = array();
		foreach($match as $key => $item){
			$players[$key]['name'] = $item->players;
			$players[$key]['winnings'] = $item->winnings;
		}
		return $players;
		//order players by winnings
		usort($players, function($a, $b) {
			return $a['winnings'] - $b['winnings'];
		});
		return $players;
    }

}
