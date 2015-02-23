<?php
namespace GolfLeague;

class PrizeMoney {

    protected $lowScore;
    protected $skins;
    protected $ctp = 5;
    protected $purse;

    public function setPurse($purse)
    {
        $this->purse = $this->asMoney($purse - ($this->ctp  * 2));
    }

    public function getlowScore()
    {
        $this->lowScore = .18 * $this->purse;
        return $this->asMoney($this->lowScore);
    }

    public function getSkins()
    {
        $this->skins = .32 * $this->purse;
        return $this->asMoney($this->skins);
    }

    public function getCtp()
    {
        return $this->asMoney($this->ctp);
    }
	
	function asMoney($value) {
	  return number_format($value, 2);
	}
}
