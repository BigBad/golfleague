<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoundsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rounds', function(Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('player_id')->unsigned()->index();
            $table->integer('course_id')->unsigned()->index();
			$table->integer('match_id')->unsigned()->index()->nullable();
            $table->integer('score');
            $table->integer('esc');


            $table->timestamps();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::drop('scores');
    }

}
