<?php

class SettingsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('settings')->delete();

        Settings::create(array(
            'currentRound' => '34',
            'roundThatIsBeingRated' => '34',
            'amountOfPitchesLimit' => '250',
            'minimumRatingsToBeCounted' => '3',
            'lowestPositionForRandomLottery' => '20',
            'topPitchesPercentage' => '0.5'
            ));
    }
}