<?php

class Settings extends Eloquent {

    protected $guarded = array();

    public static $rules = array();

    public function pitchesLeft()
    {
    	$maxAmount = $this->amountOfPitchesLimit;
    	$currentRound = $this->currentRound;
    	$currently = DB::table('payments')->where('round','=',$currentRound)->where('payment_success','=','1')->count();
        $left = $maxAmount - $currently;
    	return max($left,0); //never show a negative number.
    }

    public function makeSureUserIsAdmin()
    {
        if (!(Auth::user()) || Auth::user()->role =! 'admin') {
        App::abort(401, 'You are not authorized.');
        }

    }

    public function acceptPayments()
    {
        return ($this->pitchesLeft() > 0);
    }

    protected $table = 'settings';

}