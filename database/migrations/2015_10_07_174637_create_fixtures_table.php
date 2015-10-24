<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('fixtures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stadium_id')->unsigned();
            $table->integer('league_id')->unsigned();
            $table->timestamp('fixture_date');
            $table->integer('team_1_id')->unsigned();
            $table->integer('team_2_id')->unsigned();
            $table->integer('team_1_score')->unsigned()->default(0);
            $table->integer('team_2_score')->unsigned()->default(0);
            $table->timestamps();
        });

        Schema::table('fixtures', function($table) {
            $table->foreign('stadium_id')->references('id')->on('stadiums');
            $table->foreign('league_id')->references('id')->on('leagues');
            $table->foreign('team_1_id')->references('id')->on('teams');
            $table->foreign('team_2_id')->references('id')->on('teams');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::drop('fixtures');
    }
}
