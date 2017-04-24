<?php
/**
 * Created by PhpStorm.
 * User: mschmidt
 * Date: 4/21/2017
 * Time: 4:31 PM
 */

namespace GolfLeague\Handlers;


class TeamMatchHandler
{
    /**
     * Create a new instance of the TeamMatchHandler
     *
     * @param
     * @return void
     */
    public function __construct()
    {

    } // End of __construct

    /**
     * Create an initial round for each player after a new match is created
     *
     * @param  Match $match
     * @return void
     */
    public function handle($match)
    {


    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('match.create', 'GolfLeague\Handlers\TeamMatchHandler');
    }
}