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
		$this->app->bind(
          'GolfLeague\Storage\Match\MatchRepository',
          'GolfLeague\Storage\Match\EloquentMatchRepository'
        );
		$this->app->bind(
          'GolfLeague\Storage\MatchRound\MatchRoundRepository',
          'GolfLeague\Storage\MatchRound\EloquentMatchRoundRepository'
        );
		$this->app->bind(
          'GolfLeague\Storage\Player\PlayerRepository',
          'GolfLeague\Storage\Player\EloquentPlayerRepository'
        );
		$this->app->bind(
          'GolfLeague\Storage\HoleScore\HoleScoreRepository',
          'GolfLeague\Storage\HoleScore\EloquentHoleScoreRepository'
        );
		$this->app->bind(
          'GolfLeague\Storage\Leaderboard\LeaderboardRepository',
          'GolfLeague\Storage\Leaderboard\EloquentLeaderboardRepository'
        );
		$this->app->bind(
          'GolfLeague\Storage\Skin\SkinRepository',
          'GolfLeague\Storage\Skin\EloquentSkinRepository'
        );
		$this->app->bind(
          'GolfLeague\Storage\Ctp\CtpRepository',
          'GolfLeague\Storage\Ctp\EloquentCtpRepository'
        );
        $this->app->bind(
            'GolfLeague\Storage\Team\TeamRepository',
            'GolfLeague\Storage\Team\EloquentTeamRepository'
        );
        $this->app->bind(
            'GolfLeague\Storage\Team\TeamMatchesRepository',
            'GolfLeague\Storage\Team\EloquentTeamMatchesRepository'
        );
    }
}
