<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('player_statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goals')->unsigned();
            $table->integer('assists')->unsigned();
            $table->integer('player_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('player_statistics', function (Blueprint $table){
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('player_statistics');
    }
}
