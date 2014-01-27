<?php

class Pitch extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'company_name' => 'required',
		'video_url' => 'required',
		'investment_size' => 'required',
		'user_id' => 'required',
	);

	protected $table = 'pitches';

	public function isPayedThisRound()
	{
		$thisRound = Settings::all()->last()->currentRound;
		$doesExist = DB::table('payments')->where('round','=',$thisRound)->where('pitch_id','=',$this->id)->where('payment_success','=','1')->count();

		return $doesExist != 0;		
	}

	public function hasBeenPreviouslySuccessfullyPaid()
    {
    	$thisRound = Settings::all()->last()->currentRound;
    	//check if a successful payment exist on previous round.
		$doesExist = DB::table('payments')->where('round','<',$thisRound)->where('pitch_id','=',$this->id)->where('payment_success','=','1')->count();

		return $doesExist != 0;
    }

    public function paymentFailedThisRound()
    {
    	$thisRound = Settings::all()->last()->currentRound;
		$failedPaymentExists = DB::table('payments')->where('round','=',$thisRound)->where('pitch_id','=',$this->id)->where('payment_success','=','0')->count();
		$successfulPaymentExists = $this->isPayedThisRound();

		//make sure that there exists a failed payment, and that a successful payment for this round does not exist.
		return $failedPaymentExists && !$successfulPaymentExists;		
    }

    public function pitchShouldBeEditable()
    {
    	return !($this->isPayedThisRound() || $this->hasBeenPreviouslySuccessfullyPaid());
    }

    public function completeVideoString()
    {
    	return 'http://www.youtube.com/watch?v=' . $this->video_url;
    }

    public function embedVideoString()
    {
    	return 'http://www.youtube.com/embed/' . $this->video_url;
    }

	public function makeSurePitchOwnerIsLoggedIn()
	{
		$loggedInUserId = -1;
		if (Auth::check()) {
			$loggedInUserId = Auth::user()->id;
		}

		if ($loggedInUserId != $this->user_id) {
			App::abort(401, 'You are not authorized for this action');
		}
	}
}