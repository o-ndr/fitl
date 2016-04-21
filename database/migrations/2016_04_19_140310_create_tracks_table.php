<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('track');
            $table->timestamps();
        });
        Schema::create('presentations_tracks', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('presentation_id')->unsigned()->index();
            $table->foreign('presentation_id')->references('id')->on('presentations')
                ->onDelete('cascade');

            $table->integer('track_id')->unsigned()->index();
            $table->foreign('track_id')->references('id')->on('tracks')
                ->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tracks');
        Schema::drop('presentations_tracks');
    }
}
