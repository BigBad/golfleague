<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentdatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tournamentdates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tournament_id')->unsigned()->index();
			$table->date('date')->unique();
			
			$table->timestamps();
			$table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tournamentdates');
	}

}
