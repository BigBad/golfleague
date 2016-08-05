<?php
/**
 * Created by PhpStorm.
 * User: mschmidt
 * Date: 8/4/2016
 * Time: 1:22 PM
 */

namespace GolfLeague\Tournament;

use GolfLeague\Tournament\Net as Net;

class TournamentFactory
{

    public function create($tournament)
    {
        switch($tournament['format']){
            case "net" || "Net":
                return new Net($tournament);
        }
    }
}