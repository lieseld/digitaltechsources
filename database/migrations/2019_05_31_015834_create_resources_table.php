<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->integer('id')->unique()->unsigned()->autoIncrement();
            $table->string('name');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('resource_categories');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->string('platform')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->boolean('private')->default(false);
            $table->boolean('downloadable')->default(true);
            $table->boolean('comments_locked')->default(false);
            $table->boolean('adult_only')->default(false);
            $table->integer('upvotes')->default(0);
            $table->integer('downloads')->default(0);
            $table->integer('views')->default(0);
            $table->dateTime('uploaded_at');
            $table->dateTime('last_edited_at');
            $table->string('license');
            $table->string('license_url');
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
        Schema::dropIfExists('resources');
    }
}
