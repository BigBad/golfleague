<?php
namespace GolfLeague;

class PrizeMoney {

    protected $lowScore;
    protected $skins;
    protected $ctp;
    protected $purse;
	
	
    public function __construct($purse)
    {
	$this->ctp = 5;
	$this->purse = $purse - ($this->ctp  * 2);
    }
	
    public function getlowScore() 
    {
        $this->lowScore = .18 * $this->purse;
	return $this->lowScore;
    }
		
    public function getSkins() 
    {
        $this->skins = .32 * $this->purse;
	return $this->skins;
    }
	
    public function getCtp()
    {
	return $this->ctp;
    }
}
