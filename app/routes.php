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
Route::get('test', function() {
    $carryOver = new GolfLeague\Services\CarryOver;
    return $carryOver->calculate();
    });
*/

//Route::get('administration', 'AdministrationController@view');

Route::get('enterscore', 'ScoreController@view');
Route::post('storescore', 'ScoreController@store');

//Route::get('players/getPlayers', 'PlayersController@getPlayers');
//Route::post('players/edit', 'PlayersController@edit');

Route::get('courses/getCourses', 'CoursesController@getCourses');
Route::post('courses/edit', 'CoursesController@edit');

//Route::get('holes/getHoles', 'HolesController@show');
//Route::post('holes/edit', 'HolesController@edit');

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
Route::resource('statistics', 'StatisticsController');
Route::resource('schedule', 'ScheduleController');
Route::resource('leaderboard', 'LeaderboardController');
Route::resource('administration', 'AdministrationController');
Route::resource('calendar', 'CalendarController');
Route::resource('liveleaderboard', 'LiveLeaderboardController');
Route::resource('register', 'RegisterController');
Route::resource('users', 'UsersController');
Route::resource('money', 'MoneyController');
Route::resource('results', 'ResultsController');