<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSantiagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('santiago', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->string('photo_path');
            $table->string('photo_name');
            $table->string('opening');
            $table->string('dimensions');
            $table->string('address');
            $table->string('capacity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
