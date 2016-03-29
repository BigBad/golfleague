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
        $holes = Hole::where('course_id', '=', $round['course_id'])->get();
        foreach($holes as $hole){
            $input = array(
                'score' => null,
                'hole_id' => $hole->id,
                'round_id' => $round['id']
            );
            $this->holescoreRepo->create($input);
        }



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
