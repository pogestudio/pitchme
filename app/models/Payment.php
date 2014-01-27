<?php

class Payment extends Eloquent {

    protected $guarded = array();

    public static $rules = array(
		'pitch_id' => 'required',
		'round' => 'required'
    	);


    protected $table = 'payments';

}