<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->mediumText('text');
            $table->integer('score')->default(0);
            $table->boolean('isFinished')->default(false);
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

        Schema::dropIfExists('story_user');
        /* Schema::table('story_user', function (Blueprint $table) {
            $table->dropForeign('story_id');
        }); */
        Schema::dropIfExists('stories');
    }
}
