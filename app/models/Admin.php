<?php

class Admin extends Eloquent {
    protected $guarded = array();

    private static function makePitchWinner($pitch)
    {
        Winner::create(array(
            'round' => Settings::all()->last()->roundThatIsBeingRated,
            'pitch_id' => $pitch->pitch_id,
            'user_id' => Pitch::find($pitch->pitch_id)->user_id,
            ));
    }

    public static function rankAllPitches()
    {
    	Settings::all()->last()->makeSureUserIsAdmin();

        $roundThatIsBeingRated = Settings::all()->last()->roundThatIsBeingRated;
        $minimumRatingsToBeCounted = Settings::all()->last()->minimumRatingsToBeCounted;
        $lowestPositionForRandomLottery = Settings::all()->last()->lowestPositionForRandomLottery;

        //first find all panel users who have more than the threshold of ratings per week.
        //use that to get the average ratings of all pitches with enough ratings
        $sql = '
        SELECT pitch_id, AVG(rating) AS AVGRating, round
        FROM
            (SELECT * FROM ratings
        NATURAL JOIN

            (SELECT user_id
            FROM
                (SELECT COUNT(*) AS pitchesRated, user_id
                FROM
                    ratings
                GROUP BY user_id) AS userRatings
                WHERE userRatings.pitchesRated > ' . $minimumRatingsToBeCounted . ') AS usersWithEnoughRatings
            WHERE ratings.round = '. $roundThatIsBeingRated .') AS correctRatings
        GROUP BY pitch_id
        ORDER BY AVGRating DESC';

        $allRankedPitches = DB::select($sql);

        $ranking = 1;
        foreach ($allRankedPitches as $pitchInfo) {
            $pitch = Pitch::find($pitchInfo->pitch_id);
            $pitch->rank = $ranking++;
            $pitch->save();
        }
    }

    public static function createWinnersFromRound()
    {

        Settings::all()->last()->makeSureUserIsAdmin();
        
        //first find all panel users who have more than the threshold of ratings per week.
        $roundThatIsBeingRated = Settings::all()->last()->roundThatIsBeingRated;
        $minimumRatingsToBeCounted = Settings::all()->last()->minimumRatingsToBeCounted;
        $lowestPositionForRandomLottery = Settings::all()->last()->lowestPositionForRandomLottery;

        //Query for getting the average rating of the top 
        $sql = '
        SELECT ratedPitches.pitch_id, AVG(rating) AS AVGRating, round

        FROM
            (SELECT user_id, rating, pitch_id, round
                FROM
                    ratings
                    NATURAL JOIN

                    (SELECT user_id
                    FROM
                        (SELECT COUNT(*) AS pitchesRated, user_id
                        FROM
                            ratings
                        GROUP BY user_id) AS userRatings
                        WHERE userRatings.pitchesRated > ' . $minimumRatingsToBeCounted . ') AS usersWithEnoughRatings
                    WHERE ratings.round = '. $roundThatIsBeingRated .'
            ) AS ratedPitches
        INNER JOIN
            (SELECT pitch_id 
            FROM
                payments
            WHERE payment_success = 1
            ) as paidPitches
        ON ratedPitches.pitch_id =  paidPitches.pitch_id

        GROUP BY pitch_id
        ORDER BY AVGRating DESC
        LIMIT 0,'. $lowestPositionForRandomLottery;

        $topPitches = DB::select($sql);

        $theRandomIndex = rand(0,min(count($topPitches), $lowestPositionForRandomLottery) - 1); // make sure its lower than count. Also, -1 since it's 0 indexed.
        if ($theRandomIndex == 0) {
            $theRandomIndex++; //if the random one is the first one, make it become the 2nd.
        }

        $winnerPitch = head($topPitches);
        $randomPitch = $topPitches[$theRandomIndex];

        Admin::makePitchWinner($winnerPitch);
        Admin::makePitchWinner($randomPitch);
    }
}