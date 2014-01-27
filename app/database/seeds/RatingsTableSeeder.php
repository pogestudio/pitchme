<?php

class RatingsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('ratings')->delete();

        Rating::create(array(
            'user_id' => '4',
            'rating' => '8.0',
            'pitch_id' => '1',
            'feedback' => 'Blah blah'
            ));
        // Uncomment the below to run the seeder
        //DB::table('ratings')->insert($ratings);
        DB::statement('ALTER TABLE ratings ADD UNIQUE INDEX(user_id, pitch_id);');
    }
}