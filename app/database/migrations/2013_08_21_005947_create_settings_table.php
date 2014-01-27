<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('currentRound');
            $table->integer('roundThatIsBeingRated');
            $table->integer('amountOfPitchesLimit');
            $table->integer('minimumRatingsToBeCounted');
            $table->integer('lowestPositionForRandomLottery');
            $table->float('topPitchesPercentage');
            $table->boolean('acceptPayments')->default(true);
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
        Schema::drop('settings');
    }

}
