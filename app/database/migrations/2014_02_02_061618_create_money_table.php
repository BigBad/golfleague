<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMoneyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('money', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('purse', 2);
			$table->decimal('skins_a', 2);
			$table->decimal('skins_b', 2);
			$table->decimal('gross', 2);
			$table->decimal('net', 2);
			$table->integer('match_id')->unsigned()->index();

			$table->timestamps();
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
		Schema::drop('money');
	}

}
