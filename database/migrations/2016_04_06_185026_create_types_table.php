<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('presentations_types', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('presentation_id')->unsigned()->index();
            $table->foreign('presentation_id')->references('id')->on('presentations')
                ->onDelete('cascade');

            $table->integer('type_id')->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('types')
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
        Schema::drop('types');
        Schema::drop('presentations_types');
    }
}
