<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorialLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorial_logs', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->integer('user_id')->unique()->unsigned();
            $table->boolean('tutorials_disabled');
            $table->boolean('account_profile');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('tutorial_logs');
    }
}
