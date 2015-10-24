<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('photo');
            $table->string('birth_date');
            $table->string('birth_place');
            $table->integer('weight')->unsigned();
            $table->integer('height')->unsigned();
            $table->integer('season_id')->unsigned()->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('position_id')->unsigned()->nullable();
            $table->timestamps();
        });

         Schema::table('players', function($table) {
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('position_id')->references('id')->on('positions');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('players');
    }
}
