<?php

class InvestorInteraction extends Eloquent {
    protected $guarded = array();
    protected $table =  'investorInteractions';

    public static $rules = array(
		'user_id' => 'required',
		'round' => 'required'
	);


	public static function getTableOfInteractions()
	{
		$allSettings = DB::select('SELECT currentRound
									FROM
										settings
									ORDER BY
										currentRound DESC');

		$allInvestors = DB::select('SELECT * FROM users WHERE role = "vc"');

		
		$completeArray = array();

		//run through all rounds
		foreach ($allSettings as $currentSetting) {
			$currentRound = $currentSetting->currentRound;

			//run through all investors

			foreach ($allInvestors as $investor) {
				// print_r($investor->id);
				// print_r($currentRound);

				$didWatch = DB::table('investorInteractions')
							->where('round','=',$currentRound)
							->where('user_id','=',$investor->id)
							->count();

				$investorArray = array(
						'round' => $currentRound,
						'name' => $investor->fname . ' ' . $investor->lname,
						'didWatch' => $didWatch > 0,
						);
				array_push($completeArray,$investorArray);
			}

		}

		return $completeArray;
	}

}

