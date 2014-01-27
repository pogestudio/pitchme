<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWinnersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winners', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('round');
			$table->integer('rank');
            $table->unsignedInteger('pitch_id')->references('id')->on('pitches');
            $table->unsignedInteger('user_id')->references('id')->on('users');
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
        Schema::drop('winners');
    }

}
