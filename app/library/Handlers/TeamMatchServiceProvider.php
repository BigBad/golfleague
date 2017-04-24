<?php
/**
 * Created by PhpStorm.
 * User: mschmidt
 * Date: 4/21/2017
 * Time: 4:32 PM
 */

namespace GolfLeague\Handlers;


class TeamMatchServiceProvider
{
    public function register()
    {

    }

    /**
     * Boot the Match Events
     *
     * @return void
     */
    public function boot()
    {
        $this->app->events->subscribe(
            new TeamMatchHandler(
                //$this->app->make('GolfLeague\Storage\Round\RoundRepository')
            )
        );
    }

}