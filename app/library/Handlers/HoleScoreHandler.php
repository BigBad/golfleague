<?php

namespace GolfLeague\Handlers;

use GolfLeague\Storage\Round\RoundRepository;
use GolfLeague\Storage\HoleScore\HoleScoreRepository;


/**
 * MatchHandler Connection Class
 *
 * This class subscribes to events in related to match creation
 *
 * @author          Michael Schmidt
 */
class HoleScoreHandler
{
    /**
     * Create a new instance of the MatchHandler
     *
     * @param  GolfLeague\Storage\Round\RoundRepository $roundRepo
     * @return void
     */
    public function __construct(RoundRepository $roundRepo, HoleScoreRepository $holescoreRepo)
    {
        $this->roundRepo= $roundRepo;
        $this->holescoreRepo = $holescoreRepo;
    } // End of __construct

    /**
     * Create an initial round for each player after a new match is created
     *
     * @param  Match $match
     * @return void
     */
    public function handle($holescore)
    {
        echo 'here';
        //var_dump($holescore);

        // use holescore->round_id to get all holescores for that round

    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('eloquent.updated: Holescore', 'GolfLeague\Handlers\HoleScoreHandler');
    }
}
