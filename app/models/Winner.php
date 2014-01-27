<?php

class Winner extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'user_id' => 'required',
		'pitch_id' => 'required',
		'round' => 'required|integer'
	);
	protected $table = 'winners';

}