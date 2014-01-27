<?php

class Rating extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'pitch_id' => 'required',
		'rating' => 'required',
		'user_id' => 'required'
	);

}