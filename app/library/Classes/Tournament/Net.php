<?php
/**
 * Created by PhpStorm.
 * User: mschmidt
 * Date: 8/4/2016
 * Time: 1:21 PM
 */

namespace GolfLeague\Tournament;

use \Tournament;
use GolfLeague\Storage\MatchRound\EloquentMatchRoundRepository as MatchRound;
use GolfLeague\Services\LeaderboardService as LeaderboardService;

class Net
{
    private $tournament;

    public function __construct(array $tournament)
    {
        $this->tournament = Tournament::where('id', '=', $tournament['id'])->with('dates')->get();
    }

    function get()
    {
        return 'im a net tournament with an ID of ' . $this->tournament->id;
    }

    function getLeaderboard()
    {
        //Quick and Dirty code for 2016 Tournament only
        // Will expand and extract later
        $matches = [];
        //for each date get the matchid that corresponds
        foreach($this->tournament as $tournament){
            foreach($tournament->dates as $date){
                $match = \Match::where('date', '=', $date->date)->get();
                foreach ($match as $m){
                    $matchid = $m->id;
                }
                $matchRound = new MatchRound();
                $leaderboardService = new LeaderboardService($matchRound);
                $current = $leaderboardService->calculate($matchid,'net');
                $matches = array_merge($matches, $current);
            }
        }

        $leaderboard = [];

        foreach($matches as $key=>$player){
            $inArrayKey =  $this->in_array_r($player['name'], $leaderboard, true);
            if($inArrayKey === false){
                $leaderboard[$key]['name'] = $player['name'];
                $leaderboard[$key]['score'] = $player['score'];
            }
            else{
                $score = $player['score'] + $leaderboard[$inArrayKey]['score'];
                $leaderboard[$inArrayKey]['score'] = $score;
            }
        }

        $name = [];
        $score = [];
        foreach ($leaderboard as $key => $player) {
            $name[$key]  = $player['name'];
            $score[$key] = $player['score'];
        }

        array_multisort($score, SORT_ASC, $name, SORT_ASC, $leaderboard);
        return $leaderboard;
    }

    function in_array_r($needle, $haystack, $strict = false) {
        foreach ($haystack as $key=>$item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
                return $key;
            }
        }

        return false;
    }


}