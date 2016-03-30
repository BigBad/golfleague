<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function()
{
    return View::make('home'); //make a home page
});
/*
Route::get('/test', function()
{
    $stats = new  GolfLeague\Statistics\League\LeagueStatisticsEloquent();
    return $stats->totalOthers('2015');
});
*/
Route::get('enterscore', 'ScoreController@view');
Route::post('storescore', 'ScoreController@store');


Route::get('courses/getCourses', 'CoursesController@getCourses');
Route::post('courses/edit', 'CoursesController@edit');


Route::get('creatematch', 'MatchesController@view');
Route::get('matches/getMatches', 'MatchesController@getMatches');
Route::post('matches/edit', 'MatchesController@edit');

Route::get('enterscores', 'EnterScoresController@view');

//Resources
Route::resource('rounds', 'RoundsController');
Route::resource('players', 'PlayersController');
Route::resource('holes', 'HolesController');
Route::resource('holescores', 'HoleScoresController');
Route::resource('matches', 'MatchesController');
Route::resource('finalize', 'FinalizeController');
Route::resource('courses', 'CoursesController');
Route::resource('levels', 'LevelsController');
Route::resource('matchrounds', 'MatchRoundController');
Route::resource('statistics/league', 'LeagueStatisticsController');
Route::resource('statistics/individual', 'IndividualStatisticsController');
Route::resource('schedule', 'ScheduleController');
Route::resource('leaderboard', 'LeaderboardController');


//Route::resource('administration', 'AdministrationController');
Route::get('administration', array('before' => 'auth', 'uses' => 'AdministrationController@index'));

Route::resource('calendar', 'CalendarController');
Route::resource('liveleaderboard', 'LiveLeaderboardController');
Route::resource('register', 'RegisterController');
//Route::resource('users', 'UsersController');
Route::resource('money', 'MoneyController');
Route::resource('results', 'ResultsController');
Route::resource('skins', 'SkinsController');
Route::resource('gross', 'GrossController');
Route::resource('scoringaverage', 'ScoringAverageController');
Route::resource('net', 'NetController');
Route::resource('bird', 'BirdController');
Route::resource('par', 'ParController');
Route::resource('bogey', 'BogeyController');
Route::resource('double', 'DoubleController');
Route::resource('other', 'OtherController');
Route::resource('years', 'YearsController');

Route::resource('test', 'TestController');

//Player Statistics
Route::get('playerStatistics/scoringAverage/{playerId}', 'PlayerStatisticsController@scoringAverage');
Route::get('playerStatistics/scoringAverage/{playerId}/{year}', 'PlayerStatisticsController@scoringAverageByYear');
Route::get('playerStatistics/birdies/{playerId}/{year}', 'PlayerStatisticsController@birdiesByYear');

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');