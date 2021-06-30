<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrawingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drawings', function (Blueprint $table) {
            $table->id();
            $table->longText('image');
            $table->integer('score')->default(0);;
            $table->boolean('isFinished')->default(false);;
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
        /* Schema::table('drawing_user', function (Blueprint $table) {
            $table->dropForeign(['drawing_id']);
        }); */
        Schema::dropIfExists('drawing_user');
        Schema::dropIfExists('drawings');
    }
}
