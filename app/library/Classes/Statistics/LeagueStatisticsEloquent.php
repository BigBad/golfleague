<?php namespace GolfLeague\Statistics\League;

use Illuminate\Support\Collection;
use \Round;
use \Player;
use \Skin;
use \Netwinner;
use \Holescore;
use \Match;

class LeagueStatisticsEloquent implements LeagueStatistics
{
    public function topFiveLowestScores()
    {
        return Round::with('player','course')->orderBy('score')->take(5)->get();
    }
    public function topFiveLowestScoresByYear($year)
    {
        $date1 = $year . '-01-01';
        $date2 = $year . '-12-31';
        return Round::with('player', 'course')
            ->where('match_id', '>', '0')
            ->where('date', '>=', $date1)
            ->where('date', '<=', $date2)
            ->orderBy('score')
            ->take(5)
            ->get();
    }
    public function topFiveScoringAverageByYear($year)
    {
        //Get players
        //For each player where match > 0 select scores and average them
        //Store in players array
        $date1 = $year . '-01-01';
        $date2 = $year . '-12-31';
        $players = Player::all();
        $average = array();
        $i = 0;
        foreach($players as $key => $player) {
            $rounds = Round::where('match_id', '>', '0')
                ->where('player_id', '=', $player->id)
                ->where('date', '>=', $date1)
                ->where('date', '<=', $date2)
                ->get();
            $scores = array();
			foreach($rounds as $round) {
				$scores[] = $round->score;
			}
            if(count($scores) > 0) {
                $average[$i]['average'] = round((array_sum($scores) / count($scores)) ,2);
                $average[$i]['player_id'] = $player->id;
                $average[$i]['name'] = $player->name;
                $average[$i]['rounds'] = count($scores);
                $i++;
            }
        }
        array_multisort($average);
        return $average;
    }
    public function topFiveNetScoresByYear($year)
    {
		$date1 = $year . '-01-01';
		$date2 = $year . '-12-31';

		return Netwinner::with('player','match','match.course')
				->where('created_at', '>=', $date1)
				->where('created_at', '<=', $date2)
				->orderBy('score')->take(5)->get();
    }
    public function mostSkinsByYear($year)
    {
        $year = $year . '-01-01';
        $players = Player::all();
        $i = 0;
        $skinsCount = array();
        foreach($players as $key => $player) {
            $skins = Skin::with('player','level')
                ->where('player_id', '=', $player->id)
                ->where('created_at', '>', $year)
                ->get();
            if(count($skins) > 0) {
                $skinsCount[$i]['skins'] = $skins->count();
                $skinsCount[$i]['name'] = $player->name;
                $i++;
            }
        }
        array_multisort($skinsCount, SORT_DESC);
        return $skinsCount;
    }
    public function totalEagles($year){}
    public function totalBirdies($year)
	{
		$year = $year . '-01-01';
		$holescores = Holescore::with('round.player','hole')
			->where('created_at', '>', $year)
			->get();
		$allBirdies = array();
		foreach($holescores as $key => $holescore) {
			if($holescore['round']['match_id'] != null){
				if( ($holescore['hole']['par'] - $holescore['score']) === 1) {
						$allBirdies[]= $holescore['round']['player']['name'];
				}
			}
		}
		$i =0;
		$newArray = array_count_values($allBirdies);
			$birds = array();
			foreach ($newArray as $key => $value) {
				$birds[$i]['name'] = $key;
				$birds[$i]['birds'] =$value;
				$i++;
			}
			return $birds;
	}
    public function totalPars($year)
	{
		$year = $year . '-01-01';
		$holescores = Holescore::with('round.player','hole')
			->where('created_at', '>', $year)
			->get();
		$allPars = array();
		foreach($holescores as $key => $holescore) {
			if($holescore['round']['match_id'] != null){
				if( ($holescore['hole']['par'] - $holescore['score']) === 0) {
						$allPars[]= $holescore['round']['player']['name'];
				}
			}
		}
		$i =0;
		$newArray = array_count_values($allPars);
			$pars = array();
			foreach ($newArray as $key => $value) {
				$pars[$i]['name'] = $key;
				$pars[$i]['pars'] =$value;
				$i++;
			}
			return $pars;
	}
    public function totalBogeys($year)
	{
		$year = $year . '-01-01';
		$holescores = Holescore::with('round.player','hole')
			->where('created_at', '>', $year)
			->get();
		$allBogeys = array();
		foreach($holescores as $key => $holescore) {
			if($holescore['round']['match_id'] != null){
				if( ($holescore['score'] - $holescore['hole']['par']) === 1) {
						$allBogeys[]= $holescore['round']['player']['name'];
				}
			}
		}
		$i = 0;
		$newArray = array_count_values($allBogeys);
		$bogeys = array();
			foreach ($newArray as $key => $value) {
				$bogeys[$i]['name'] = $key;
				$bogeys[$i]['bogeys'] =$value;
				$i++;
			}
		return $bogeys;
	}
    public function totalDoubles($year)
	{
		$year = $year . '-01-01';
		$holescores = Holescore::with('round.player','hole')
			->where('created_at', '>', $year)
			->get();
		$allDoubles = array();
		foreach($holescores as $key => $holescore) {
			if($holescore['round']['match_id'] != null){
				if( ($holescore['score'] - $holescore['hole']['par']) === 2) {
						$allDoubles[]= $holescore['round']['player']['name'];
				}
			}
		}
		$i = 0;
		$newArray = array_count_values($allDoubles);
			$doubles = array();
			foreach ($newArray as $key => $value) {
				$doubles[$i]['name'] = $key;
				$doubles[$i]['doubles'] =$value;
				$i++;
			}
		return $doubles;
	}
    public function totalOthers($year)
	{
		$year = $year . '-01-01';
		$holescores = Holescore::with('round.player','hole')
			->where('created_at', '>', $year)
			->get();
		$allOthers = array();
		foreach($holescores as $key => $holescore) {
			if($holescore['round']['match_id'] != null){
				if( ($holescore['score'] - $holescore['hole']['par']) > 2) {
					$allOthers[]= $holescore['round']['player']['name'];
				}
			}
		}
		$i = 0;
		$newArray = array_count_values($allOthers);
		$others = array();
			foreach ($newArray as $key => $value) {
				$others[$i]['name'] = $key;
				$others[$i]['others'] =$value;
				$i++;
			}
		return $others;
	}

	public function netScoresByPlayer($playerId)
	{
		// Get players match scores
		$rounds = Round::with('player')
			->where('player_id', '=', $playerId)
			->where('date', '>', '2016-01-01')
			->whereNotNull('match_id')->get();

		//for each round get match handicap
		$rounds->map(function($round)
		{
			$playerMatch = Player::find($round->player_id)->matches()->where('match_player.match_id','=', $round->match_id)->get();
			foreach($playerMatch as $player){
				$handicap = $player['pivot']['handicap'];
				$round->handicap = $handicap;
			}
		});
		//Calculate net score using match handicap
		$rounds->map(function($round)
		{
			$net = ($round->score - round($round->handicap));
			return $round->netScore = ($net - $round->course->par);
		});

		// Sort by netScore
		$rounds->sort(function($a, $b)
		{
			$a = $a->netScore;
			$b = $b->netScore;
			if ($a === $b) {
				return 0;
			}
			return ($a > $b) ? 1 : -1;
		});

		return $rounds;

	}
	public function netScoresByPlayerTop($playerId,$top)
	{
		$netScores = $this->netScoresByPlayer($playerId);
		return $netScores->take($top);
	}
	public function netScoresByPlayerYear($playerId, $year)
	{
		$date1 = $year . '-01-01';
		$date2 = $date1 -1;
		$date2 .= '-01-01';
		// Get players match scores
		$rounds = Round::with('player')
			->where('player_id', '=', $playerId)
			->where('date', '>', $date1)
			->where('date','<', $date2)
			->whereNotNull('match_id')->get();

		//for each round get match handicap
		$rounds->map(function($round)
		{
			$playerMatch = Player::find($round->player_id)->matches()->where('match_player.match_id','=', $round->match_id)->get();
			foreach($playerMatch as $player){
				$handicap = $player['pivot']['handicap'];
				$round->handicap = $handicap;
			}
		});
		//Calculate net score using match handicap
		$rounds->map(function($round)
		{
			$net = ($round->score - round($round->handicap));
			return $round->netScore = ($net - $round->course->par);
		});

		// Sort by netScore
		$rounds->sort(function($a, $b)
		{
			$a = $a->netScore;
			$b = $b->netScore;
			if ($a === $b) {
				return 0;
			}
			return ($a > $b) ? 1 : -1;
		});

		return $rounds;
	}
	public function netScoresByPlayerTopYear($playerId,$top, $year)
	{
		$netScores = $this->netScoresByPlayerYear($playerId, $year);
		return $netScores->take($top);
	}

	public function netScoresLeague()
	{
		//get players
		$players = Player::all();

		$netScores = new \Illuminate\Support\Collection();
		foreach($players as $player){
			$netScores->push($this->netScoresByPlayer($player->id));
		}
		return $netScores;

	}
	public function netScoresLeagueTop($number)
	{
		//get players
		$players = Player::all();

		$netScores = new \Illuminate\Support\Collection();
		foreach($players as $player){
			$netScore = $this->netScoresByPlayerTop($player->id, $number);
			if(!$netScore->isEmpty()){
				$netScores->push($netScore);
			}
		}

		return $netScores;
	}
	public function netScoresLeagueYear($year)
	{
		//get players
		$players = Player::all();

		$netScores = new \Illuminate\Support\Collection();
		foreach($players as $player){
			$netScores->push($this->netScoresByPlayerYear($player->id,$year));
		}
		return $netScores;
	}
	public function netScoresLeagueTopYear($top,$year)
	{
		//get players
		$players = Player::all();

		$netScores = new \Illuminate\Support\Collection();
		foreach($players as $player){
			$netScore = $this->netScoresByPlayerTopYear($player->id, $top, $year);
			if(!$netScore->isEmpty()){
				$netScores->push($netScore);
			}
		}

		return $netScores;
	}

	public function netCumulative()
	{
		//get players
		$players = Player::all();

		$cumulativeNetScores = new \Illuminate\Support\Collection();
		foreach($players as $player){
			$cumulativeNetScores->push($this->netCumulativeByPlayer($player->id));
		}
		return $cumulativeNetScores;
	}
	public function netCumulativeTop($top)
	{
		//get players
		$players = Player::all();

		$cumulativeNetScores = new \Illuminate\Support\Collection();
		foreach($players as $player){
			$netScore = $this->netCumulativeByPlayerTop($player->id, $top);
			if($netScore->isEmpty() == false){
				$cumulativeNetScores->push($netScore);
			}
		}

		return $cumulativeNetScores;
	}
	public function netCumulativeByPlayer($playerId)
	{
		$netScores = $this->netScoresByPlayer($playerId);
		$cumulativeNet= new \Illuminate\Support\Collection();

		if($netScores->count() > 0){
			$netScore = $netScores->first();

			$totalNetScore = $netScores->sum('netScore');
			$cumulativeNet->put('player', $netScore->player->name);
			$cumulativeNet->put('score', $totalNetScore);
			$cumulativeNet->put('rounds', $netScores->count());
		}

		return $cumulativeNet;
	}
	public function netCumulativeByPlayerTop($playerId, $top)
	{
		$netScores = $this->netScoresByPlayerTop($playerId, $top);
		$cumulativeNet= new \Illuminate\Support\Collection();

		if($netScores->count() > 0){
			$netScore = $netScores->first();

			$totalNetScore = $netScores->sum('netScore');
			$cumulativeNet->put('player', $netScore->player->name);
			$cumulativeNet->put('score', $totalNetScore);
			$cumulativeNet->put('rounds', $netScores->count());
		}

		return $cumulativeNet;
	}
	public function netCumulativeYear($year)
	{
		//get players
		$players = Player::all();

		$cumulativeNetScores = new \Illuminate\Support\Collection();
		foreach($players as $player){
			$cumulativeNetScores->push($this->netCumulativeByPlayerYear($player->id,$year));
		}
		return $cumulativeNetScores;
	}
	public function netCumulativeTopYear($top,$year)
	{
		//get players
		$players = Player::all();

		$cumulativeNetScores = new \Illuminate\Support\Collection();
		foreach($players as $player){
			$netScore = $this->netCumulativeByPlayerTopYear($player->id, $top, $year);
			if($netScore->isEmpty() == false){
				$cumulativeNetScores->push($netScore);
			}
		}

		return $cumulativeNetScores;
	}
	public function netCumulativeByPlayerYear($playerId,$year)
	{
		$netScores = $this->netScoresByPlayerYear($playerId, $year);
		$cumulativeNet= new \Illuminate\Support\Collection();

		if($netScores->count() > 0){
			$netScore = $netScores->first();

			$totalNetScore = $netScores->sum('netScore');
			$cumulativeNet->put('player', $netScore->player->name);
			$cumulativeNet->put('score', $totalNetScore);
			$cumulativeNet->put('rounds', $netScores->count());
		}

		return $cumulativeNet;
	}
	public function netCumulativeByPlayerTopYear($playerId,$top,$year)
	{
		$netScores = $this->netScoresByPlayerTopYear($playerId, $top, $year);
		$cumulativeNet= new \Illuminate\Support\Collection();

		if($netScores->count() > 0){
			$netScore = $netScores->first();

			$totalNetScore = $netScores->sum('netScore');
			$cumulativeNet->put('player', $netScore->player->name);
			$cumulativeNet->put('score', $totalNetScore);
			$cumulativeNet->put('rounds', $netScores->count());
		}

		return $cumulativeNet;
	}


}
