<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSinglesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('singles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('player_1')->unsigned()->index();
			$table->integer('player_2')->unsigned()->index();
			$table->integer('match_id')->unsigned()->index();
			$table->foreign('player_1')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('player_2')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
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
		Schema::drop('singles');
	}

}
