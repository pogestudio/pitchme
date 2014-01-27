<?php

class AuthController extends BaseController {

    public function showLogin()
    {
        Log::info('logging in');
        // Check if we already logged in
        if (Auth::check())
        {
            return Redirect::to('')->with('success', 'You are already logged in');
        }

        // Show the login page
        return View::make('auth/login');
    }

    public function postLogin()
    {
        // Get all the inputs
        // id is used for login, username is used for validation to return correct error-strings
        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );

        // Declare the rules for the form validation.
        $rules = array(
            'email'  => 'Required',
            'password'  => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make($userdata, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
            // Try to log the user in.
            if (Auth::attempt($userdata))
            {
                $redirectEndpoint = '';
                if (Auth::user()->role == 'vc') {
                    $redirectEndpoint = 'winners';
                } else if (Auth::user()->role == 'entrepreneur') {
                    $redirectEndpoint = 'profile';
                } else if (Auth::user()->role == 'panel') {
                    $redirectEndpoint = 'rateNext';
                }
                // Redirect to homepage
                return Redirect::to($redirectEndpoint)->with('success', 'You have logged in successfully');
            }
            else
            {
                // Redirect to the login page.
                return Redirect::to('login')->withErrors(array('password' => 'Password invalid'))->withInput(Input::except('password'));
            }
        }

        // Something went wrong.
        return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
    }

    public function getLogout()
    {
        // Log out
        Auth::logout();

        // Redirect to homepage
        return Redirect::to('')->with('success', 'You are logged out');
    }

    public function getSignup()
    {
        // Log out
        Auth::logout();

        // Redirect to homepage
        return View::make('auth/signup');
    }
    
    public function sendPasswordReminder()
    {
        $credentials = array('email' => Input::get('email'));
        return Password::remind($credentials, function($message, $user)
        {
            $message->subject('Pitch.xxx password reset');
        });
    }

    public function getPasswordReminder()
    {
        return View::make('auth/passwordReminder');
    }

    public function getResetPassword($token)
    {
        return View::make('auth/passwordReset')->with('token', $token);
    }

    public function postResetPassword()
    {
        $token = Input::get('token');
        Log::info('TOKEN::::' . $token);
$credentials = array('email' => Input::get('email'));

    return Password::reset($credentials, function($user, $password)
    {
        $user->password = Hash::make($password);

        $user->save();

        return Redirect::to('')->with('success', 'You changed password successfully');
    });
    }

}