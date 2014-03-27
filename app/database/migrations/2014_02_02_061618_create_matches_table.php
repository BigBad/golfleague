<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('matches', function(Blueprint $table) {
			$table->increments('id');
			$table->date('date');			
			$table->integer('player_1_team_1')->unsigned()->index();
			$table->integer('player_2_team_1')->unsigned()->index();
			$table->integer('player_1_team_2')->unsigned()->index();
			$table->integer('player_2_team_2')->unsigned()->index();			
			$table->integer('course_id')->unsigned()->index();
			$table->integer('season_id')->unsigned()->index();					
			$table->foreign('player_1_team_1')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('player_2_team_1')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('player_1_team_2')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('player_2_team_2')->references('id')->on('players')->onDelete('cascade');			
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('matches');
	}

}
