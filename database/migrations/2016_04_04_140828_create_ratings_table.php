<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('presentation_id')->unsigned();
            $table->integer('rating_by_reviewer');
            $table->timestamps();
        });

        // add the presentation_id foreign key
        // which references the presentations.id column
        Schema::table('ratings', function (Blueprint $table) {
            $table->foreign('presentation_id')->references('id')->on('presentations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop the presentation_id foreign key
        Schema::table('ratings', function(Blueprint $table) {
            $table->dropForeign('ratings_presentation_id_foreign');
        });
        Schema::drop('ratings');
    }
}
