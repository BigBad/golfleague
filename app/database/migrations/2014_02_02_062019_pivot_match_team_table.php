<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotMatchTeamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match_team', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('match_id')->unsigned()->index();
			$table->integer('team_id')->unsigned()->index();
			$table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
			$table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('match_team');
	}

}
