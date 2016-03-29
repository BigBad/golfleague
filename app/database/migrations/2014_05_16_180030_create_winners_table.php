<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWinnersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('winners', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('player_id')->unsigned()->index();
			$table->integer('game_id')->unsigned()->index();
			$table->integer('match_id')->unsigned()->index();

			$table->timestamps();
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
			$table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('winners');
	}

}
