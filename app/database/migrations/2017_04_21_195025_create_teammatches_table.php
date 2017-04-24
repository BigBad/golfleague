<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeammatchesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teammatches', function(Blueprint $table)
        {
            $table->engine = 'MyISAM';
            $table->increments('id');
            $table->integer('match_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->integer('player1')->unsigned();
            $table->integer('player2')->unsigned();
            $table->integer('opponent')->unsigned();
            $table->decimal('pointsWon', 10,1);
            $table->timestamps();

            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
            $table->foreign('player1')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('player2')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('opponent')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teammatches');
    }

}
