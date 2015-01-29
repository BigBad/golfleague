<?php namespace GolfLeague\Storage;

use Illuminate\Support\ServiceProvider;


class StorageServiceProvider extends ServiceProvider 
{

    public function register()
    {
        $this->app->bind(
          'GolfLeague\Storage\Round\RoundRepository',
          'GolfLeague\Storage\Round\EloquentRoundRepository'
        );
    }
}