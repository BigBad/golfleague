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

Route::get('administration', 'AdministrationController@view');

Route::get('score', 'ScoreController@view');
Route::post('enterScore', 'ScoreController@store');

Route::get('players/getPlayers', 'PlayersController@getPlayers');
Route::post('players/edit', 'PlayersController@edit');

Route::get('courses/getCourses', 'CoursesController@getCourses');
Route::post('courses/edit', 'CoursesController@edit');

Route::get('matches/getMatches', 'MatchesController@getMatches');
Route::post('matches/edit', 'MatchesController@edit');

Route::get('enterscores', 'EnterScoresController@view');