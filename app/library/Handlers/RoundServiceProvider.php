<?php

namespace GolfLeague\Handlers;

use Illuminate\Support\ServiceProvider;

class RoundServiceProvider extends ServiceProvider
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
            new RoundHandler(
                $this->app->make('GolfLeague\Storage\HoleScore\HoleScoreRepository')
            )
        );
    }
}