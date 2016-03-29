<?php
namespace GolfLeague;

class PrizeMoney {

    protected $lowScore = 7;
    protected $skins;
    protected $ctp = 5;
    protected $purse;
	protected $skinsPot;

    public function setPurse($purse)
    {
        $this->purse = $this->asMoney($purse - ($this->ctp  * 2));
    }

    public function getlowScore()
    {
		return $this->asMoney($this->lowScore);
    }

    public function getSkins()
    {
        $this->skins = .32 * $this->purse;
        return $this->asMoney($this->skins);
    }

	public function getSkinsPot($purse)
	{
		$this->skinsPot = $purse - (2*($this->ctp) + 2*($this->lowScore));
		return $this->asMoney($this->skinsPot);
	}

	public function skinsGroupPot($purse, $totalPlayers, $groupPlayers)
	{
		$this->skinsPot = $this->getSkinsPot($purse);
		$groupPercentage = ($groupPlayers / $totalPlayers);
		return ($groupPercentage * $this->skinsPot);
	}
    public function getCtp()
    {
        return $this->asMoney($this->ctp);
    }

	function asMoney($value) {
	  return number_format($value, 2);
	}
}
