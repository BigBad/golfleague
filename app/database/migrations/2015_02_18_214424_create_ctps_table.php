<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ctps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('match_id')->unsigned()->index();
			$table->integer('player_id')->unsigned()->index();
			$table->integer('hole_id')->unsigned()->index();
			$table->decimal('money', 12, 2);

			$table->timestamps();
			$table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
			$table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
			$table->foreign('hole_id')->references('id')->on('holes')->onDelete('cascade');
			$table->unique(array('match_id', 'hole_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ctps');
	}

}
