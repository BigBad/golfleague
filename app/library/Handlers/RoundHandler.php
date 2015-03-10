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
/*
        array (size=1)
      0 => string 'id'
    array (size=6)
      0 => string 'date' (length=4)
      1 => string 'player_id' (length=9)
      2 => string 'course_id' (length=9)
      3 => string 'match_id' (length=8)
      4 => string 'score' (length=5)
      5 => string 'esc' (length=3)
        //round object has course id
        //go get holes for the course
        $holes = Hole::where('course_id', '=', $round['course_id']);

        dd($round);
        //create input for initial holescore
*/
        //go get holes for the course
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
