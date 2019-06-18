<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_reports', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('date_time');
            $table->string('content_url');
            $table->integer('issue');
            $table->text('issue_description')->nullable();
            $table->boolean('closed')->default(false);
            $table->integer('moderator_id')->nullable()->unsigned();
            $table->foreign('moderator_id')->references('id')->on('users');
            $table->text('moderator_response')->nullable();
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
        Schema::dropIfExists('content_reports');
    }
}
