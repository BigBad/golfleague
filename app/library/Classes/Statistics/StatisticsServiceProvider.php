<?php namespace GolfLeague\Statistics;

use Illuminate\Support\ServiceProvider;


class StatisticsServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
          'GolfLeague\Statistics\League\LeagueStatistics',
          'GolfLeague\Statistics\League\LeagueStatisticsEloquent'
        );
		$this->app->bind(
          'GolfLeague\Statistics\Player\PlayerStatistics',
          'GolfLeague\Statistics\Player\PlayerStatisticsEloquent'
        );
    }
}
