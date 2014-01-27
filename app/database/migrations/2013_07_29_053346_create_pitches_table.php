<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePitchesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitches', function(Blueprint $table) {
            $table->unsignedInteger('id',true);
            $table->string('video_url');
			$table->string('investment_size');
            $table->unsignedInteger('user_id')->references('id')->on('users');
            $table->boolean('allow_public');
            $table->string('company_name');
            $table->unsignedInteger('rank'); 
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
        Schema::drop('pitches');
    }

}
