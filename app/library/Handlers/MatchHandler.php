<?php

namespace GolfLeague\Handlers;

use GolfLeague\Storage\Round\RoundRepository;


/**
 * MatchHandler Connection Class
 *
 * This class subscribes to events in related to match creation
 *
 * @author          Michael Schmidt
 */
class MatchHandler
{
    /**
     * Create a new instance of the MatchHandler
     *
     * @param  GolfLeague\Storage\Round\RoundRepository $roundRepo
     * @return void
     */
    public function __construct(RoundRepository $roundRepo)
    {
        $this->roundRepo= $roundRepo;
    } // End of __construct

    /**
     * Create an initial round for each player after a new match is created
     *
     * @param  Match $match
     * @return void
     */
    public function handle($match)
    {
        //for each player create an initial round
        $input = array(
        'date' => $match['date'],
         'course_id' => $match['course'],

         'match_id' => $match['match_id'],
         'score' => 0,
         'esc' => 0
         );
         foreach($match['player'] as $player){
             $input['player_id'] = $player['player_id'];
             //If team match then add team id to $input array
             if(isset($player['team'])){
                 $input['team_id'] = $player['team'];
             }
             $this->roundRepo->create($input);
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
        $events->listen('match.create', 'GolfLeague\Handlers\MatchHandler');
    }
}
