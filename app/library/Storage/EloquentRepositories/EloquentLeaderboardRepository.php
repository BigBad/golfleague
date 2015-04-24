<?php namespace GolfLeague\Storage\Leaderboard;

use \Match as Match;

class EloquentLeaderboardRepository implements LeaderboardRepository
{

    public function get($year)
    {
        //Get all match ids for a given year
		//get all player ids
		//for each player id get total winnings from pivot where (player id and match id)
		$year = $year . '-01-01';
		$match = Match::with('players')->where('created_at', '>', $year)->get(); //get match eventually by year
		//filter out players from match
		foreach($match as $item){
			$players[] = $item->players;
		}
		//order players by winnings
		usort($players, function($a, $b) {
			return $a['winnings'] - $b['winnings'];
		});
		return $players;
    }



}
