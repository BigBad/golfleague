<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHolescoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('holescores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('score');
			$table->integer('hole_id')->unsigned()->index();
			$table->integer('round_id')->unsigned()->index();


			$table->timestamps();
			$table->foreign('hole_id')->references('id')->on('holes')->onDelete('cascade');
			$table->foreign('round_id')->references('id')->on('rounds')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('holescores');
	}

}
