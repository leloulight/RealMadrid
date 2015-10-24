<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('excerpt');
            $table->text('body');
            $table->string('slug');
            $table->integer('likes');
            $table->integer('opened');
            $table->smallInteger('deleted')->default(0);
            $table->timestamp('published_at');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->timestamps();
        }); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('posts');
    }
}
