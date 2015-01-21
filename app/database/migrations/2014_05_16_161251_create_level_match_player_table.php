<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLevelMatchPlayerTable extends Migration {

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
			$table->integer('level_id')->unsigned()->index();
			$table->integer('match_id')->unsigned()->index();
			$table->integer('player_id')->unsigned()->index();
			$table->decimal('handicap');

			$table->timestamps();
			$table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
			$table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
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
