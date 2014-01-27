<?php

class WinnersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('winners')->delete();

       Winner::create(array(
            'round' => 34,
            'pitch_id' => 1,
            'user_id' => 1,
        ));
 
        Winner::create(array(
            'round' => 34,
            'pitch_id' => 2,
            'user_id' => 2,
            ));

        // Winner::create(array(
        //     'round' => 35,
        //     'pitch_id' => 13,
        //     'user_id' => 3,
        //     ));
    }

}