<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scores', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('player_id')->unsigned()->index();
			$table->integer('match_id')->unsigned()->index()->nullable();
			$table->integer('total_score');
			$table->integer('hole_1_score')->nullable();
			$table->integer('hole_2_score')->nullable();
			$table->integer('hole_3_score')->nullable();
			$table->integer('hole_4_score')->nullable();
			$table->integer('hole_5_score')->nullable();
			$table->integer('hole_6_score')->nullable();
			$table->integer('hole_7_score')->nullable();
			$table->integer('hole_8_score')->nullable();
			$table->integer('hole_9_score')->nullable();
			
			$table->timestamps();
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
		Schema::drop('scores');
	}

}
