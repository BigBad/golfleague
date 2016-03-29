<?php namespace GolfLeague\Services;

use \Match;
use \Skin;
use \Level;

class CarryOver
{

    public function calculate()
    {
        $levels = Level::all();
        $matches = Match::all();
        $carryOverMoney = array();
        foreach ($levels as $key => $level){
            $carryOverMoney[$level->id] = 0;
            foreach($matches as $matchesKey => $match) {
                //check skins table for level and match
                $skins = Skin::where('match_id', '=', $match->id)->where('level_id', '=', $level->id)->get();
                if($skins->count() === 0 ) {
                    if ($level->id === 1){
                        $carryOverMoney[$level->id] += $match->skinsamoney;
                    }
                    else {
                        $carryOverMoney[$level->id] += $match->skinsbmoney;
                    }
                }
                else {
                    $carryOverMoney[$level->id] = 0; //reset carryover money
                }
            }
        }// End foreach
        return $carryOverMoney;
    }
}