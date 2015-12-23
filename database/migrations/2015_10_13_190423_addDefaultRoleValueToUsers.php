<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultRoleValueToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::table('users', function (Blueprint $table){
        $table->integer('role_id')->unsigned()->nullable()->default(2);
        $table->foreign('role_id')->references('id')->on('roles');
        });*/
        /*Schema::table('posts', function (Blueprint $table){
            $table->string('photo_description');
            $table->foreign('role_id')->references('id')->on('roles');
        });*/
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
