<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkinsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('player_id')->unsigned()->index();
			$table->integer('level_id')->unsigned()->index();
			$table->integer('match_id')->unsigned()->index();
			$table->integer('hole_id')->unsigned()->index();
			$table->decimal('money', 12, 2)->nullable();

			$table->timestamps();
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
			$table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
			$table->foreign('hole_id')->references('id')->on('holes')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('skins');
	}

}
