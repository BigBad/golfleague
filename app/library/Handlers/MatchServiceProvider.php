<?php

namespace GolfLeague\Handlers;

use Illuminate\Support\ServiceProvider;

class MatchServiceProvider extends ServiceProvider
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
            new MatchHandler(
                $this->app->make('GolfLeague\Storage\Round\RoundRepository')
            )
        );
    }
}
