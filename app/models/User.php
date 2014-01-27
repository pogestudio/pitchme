<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    protected $guarded = array();

    public static $rules = array(
		'email' => 'required|unique:users,email|Email',
		'fname' => 'Required|Min:2|Max:80|Alpha_dash',
		'lname' => 'Required|Min:2|Max:80|Alpha_dash',
		'password' => 'required|Min:6|confirmed',
		'accepted_terms' => 'accepted'
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');


	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function makeSureThisUserIsLoggedIn()
    {
        if ($this != Auth::user()) {
            return App::abort(401,'You are not authorized for this action. Log in as this user');
        }
    }

    public function makeSureUserIsAdmin()
    {
        if ($this->role != 'admin') {
            return App::abort(401,'You are not authorized for this action. Log in as admin');
        }
    }

    public function makeSureUserIsInvestor()
    {
        if ($this->role != 'vc') {
            return App::abort(401,'You are not authorized for this action. Log in as admin');
        }
    }

    public function makeSureUserIsEntrepreneur()
    {
        if ($this->role != 'entrepreneur') {
            return App::abort(401,'You are not authorized for this action. Log in as admin');
        }
    }

}