<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('points', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('player_id')->unsigned()->index();
			$table->integer('match_id')->unsigned()->index();
			$table->integer('single');
			$table->integer('team');
			$table->timestamps();
			
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
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
		Schema::drop('points');
	}

}
