<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('logo_name');
            $table->string('logo_path');

            $table->integer('stadium_id')->unsigned()->nullable();
            $table->foreign('stadium_id')->references('id')->on('stadiums');

            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::drop('teams');
    }
}
