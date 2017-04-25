<?php

namespace GolfLeague;

use \Player as Player;
use \Round as Round;

class Handicap
{
    private $differentialArray;
    private $player;
    private $roundsUsed;

    public function __construct(Player $player, $roundsUsed = 10)
    {
        $this->differentialArray = array(0,1,1,1,1,1,1,2,2,3,3,4,4,5,5,6,6,7,8,9,10);
        $this->player = $player;
        $this->roundsUsed = $roundsUsed; //20 is USGA standard;  Some leagues may want to adjust.
    }

    public function calculate()
    {
        $rounds = Round::where('player_id', '=', $this->player->id)->orderBy('date', 'desc')->take($this->roundsUsed)->get();
        $differential = $this->differential($rounds->count());

        $i = 1;
        foreach ($rounds as $round) {
            $differentials[$i]  = $round->esc;
            $i++;
        }
        sort($differentials);
        $chunkedRounds = array_chunk($differentials,$differential,true);
        $roundsUsed = $chunkedRounds[0];

        $sumofDifferentials = array_sum($roundsUsed);
        $handicap = (($sumofDifferentials / $differential) * .96) - 36;
        $handicap = round($handicap ,2);

        return $handicap;
    }

    //
    public function differential($numberOfScores)
    {
        if($numberOfScores <= 20){
            return $this->differentialArray[$numberOfScores];
        } else {
            return $this->differentialArray[20];
        }
    }


}