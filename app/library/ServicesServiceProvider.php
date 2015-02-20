<?php namespace GolfLeague\Services;

use Illuminate\Support\ServiceProvider;


class ServicesServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('GolfLeague\PrizeMoney', function()
        {
            return new \GolfLeague\PrizeMoney;
        });
    }
}
