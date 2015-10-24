<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*  Schema::create('poll_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer');
            $table->integer('poll_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('poll_answers', function (Blueprint $table){
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade');
        });*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::drop('poll_answers');
    }
}