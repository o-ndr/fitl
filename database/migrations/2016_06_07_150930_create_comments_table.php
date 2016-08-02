<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('presentation_id')->unsigned();
            $table->text('comment_by_reviewer');
            $table->timestamps();
        });

        // add the presentation_id foreign key
        // which references the presentations.id column
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('presentation_id')->references('id')->on('presentations')
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
        // drop the presentation_id foreign key
        Schema::table('comments', function(Blueprint $table) {
            $table->dropForeign('comments_presentation_id_foreign');
        });
        Schema::drop('comments');
    }
}
