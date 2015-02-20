<?php
namespace GolfLeague;

class PrizeMoney {

    protected $lowScore;
    protected $skins;
    protected $ctp = 5;
    protected $purse;

    public function setPurse($purse)
    {
        $this->purse = money_format('%i', ($purse - ($this->ctp  * 2)));
    }

    public function getlowScore()
    {
        $this->lowScore = .18 * $this->purse;
        return money_format('%i', $this->lowScore);
    }

    public function getSkins()
    {
        $this->skins = .32 * $this->purse;
        return money_format('%i', $this->skins);
    }

    public function getCtp()
    {
        return money_format('%i', $this->ctp);
    }
}
