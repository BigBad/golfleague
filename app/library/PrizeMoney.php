<?php
namespace GolfLeague;

class PrizeMoney {

    protected $lowScore;
    protected $skins;
    protected $ctp;
    protected $purse;

    public function __construct($purse)
    {
<<<<<<< HEAD
	    $this->ctp = 5;
	    $this->purse = $purse - ($this->ctp  * 2);
=======
        $this->ctp = 5;
        $this->purse = $purse - ($this->ctp  * 2);
>>>>>>> origin/master
    }

    public function getlowScore()
    {
        $this->lowScore = .18 * $this->purse;
<<<<<<< HEAD
	    return $this->lowScore;
=======
        return $this->lowScore;
>>>>>>> origin/master
    }

    public function getSkins()
    {
        $this->skins = .32 * $this->purse;
<<<<<<< HEAD
	    return $this->skins;
=======
        return $this->skins;
>>>>>>> origin/master
    }

    public function getCtp()
    {
<<<<<<< HEAD
	    return $this->ctp;
=======
        return $this->ctp;
>>>>>>> origin/master
    }
}
