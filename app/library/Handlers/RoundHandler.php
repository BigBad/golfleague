<?php

namespace GolfLeague\Handlers;

use GolfLeague\Storage\HoleScore\HoleScoreRepository;
use \Hole;

/**
 * MatchHandler Connection Class
 *
 * This class subscribes to events in related to match creation
 *
 * @author          Michael Schmidt
 */
class RoundHandler
{
    /**
     * Create a new instance of the MatchHandler
     *
     * @param  GolfLeague\Storage\Round\RoundRepository $roundRepo
     * @return void
     */
    public function __construct(HoleScoreRepository $holescoreRepo)
    {
        $this->holescoreRepo= $holescoreRepo;
    } // End of __construct

    /**
     * Create an initial round for each player after a new match is created
     *
     * @param  Match $match
     * @return void
     */
    public function handle($round)
    {
        //create 9 initial holescores for a round

        //round object has course id
        //go get holes for the course
        //$holes = Hole::where('course_id', '=', $round['course_id']);

        dd($round);
        //create input for initial holescore


        $input = array(
                'score' => $round['date'],
                'hole_id' => $round['course'],
                'match_id' => $round['match_id'],
                'score' => null
        );

    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('eloquent.created: Round', 'GolfLeague\Handlers\RoundHandler');
    }
}
