<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkinscarryoversTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skinscarryovers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('match_id')->unsigned()->index();
			$table->integer('level_id')->unsigned()->index();
			$table->decimal('money', 12, 2);

			$table->timestamps();
			$table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
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
		Schema::drop('skinscarryovers');
	}

}
