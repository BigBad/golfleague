<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatchPlayerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match_player', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('match_id')->unsigned()->index();
			$table->integer('player_id')->unsigned()->index();
			$table->integer('level_id')->unsigned()->index();
			$table->integer('group');
			$table->decimal('handicap');
			$table->decimal('winnings', 12,2);

			$table->timestamps();
			$table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('match_player');
	}

}
