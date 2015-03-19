<?php

namespace GolfLeague\Handlers;

use Illuminate\Support\ServiceProvider;

class HandlersServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    /**
     * Boot the Handler Events
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

        $this->app->events->subscribe(
            new RoundHandler(
                $this->app->make('GolfLeague\Storage\HoleScore\HoleScoreRepository')
            )
        );

        $this->app->events->subscribe(
            new HoleScoreHandler(
                $this->app->make('GolfLeague\Storage\Round\RoundRepository'),
                $this->app->make('GolfLeague\Storage\HoleScore\HoleScoreRepository'),
                $this->app->make('GolfLeague\EquitableStrokeControl')
            )
        );

    }
}