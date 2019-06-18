<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_comments', function (Blueprint $table) {
            $table->integer('id')->unique()->unsigned()->autoIncrement();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('resource_id')->unsigned();
            $table->foreign('resource_id')->references('id')->on('resources');
            $table->text('content');
            $table->dateTime('posted_at');
            $table->dateTime('edited_at');
            $table->integer('reply_comment_id')->unsigned()->nullable();
            $table->foreign('reply_comment_id')->references('id')->on('users');
            $table->boolean('hidden');
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
        Schema::dropIfExists('resource_comments');
    }
}
