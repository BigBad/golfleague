<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNetwinnersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('netwinners', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('match_id')->unsigned()->index()->unique();
			$table->integer('player_id')->unsigned()->index();
            $table->integer('score');
			$table->decimal('money', 12, 2);

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
		Schema::drop('netwinners');
	}

}
