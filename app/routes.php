<?php

include 'libraries/IpnListener/ipnlistener.php';

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* ----  AUTH ---- */

$auth = 'auth';

Route::group(array('before' => $auth), function()
{
	Route::resource('user', 'UserController');// array('only' => array('edit', 'update', 'destroy')));
	Route::resource('pitches', 'PitchesController');
	Route::resource('ratings', 'RatingsController');//, array('only' => array('store')));
	
	Route::get('winners', 'WinnersController@getWinners');
	Route::get('topPitches/{round}', 'WinnersController@getTopPitches');

	Route::get('rateNext', 'RatingsController@rateNext');

	Route::get('profile', 'UserController@showProfile');
});

/* ---- END OF AUTH FILTER ---- */


/* ---- NO AUTH FILTER---- */

Route::get('admin', 'AdminController@presentAdminPage');
Route::get('/admin/rankPitches', array('uses' => 'AdminController@rankPitches'));
Route::get('/admin/createWinners', array('uses' => 'AdminController@createWinners'));
Route::get('/admin/investorInteractions', array('uses' => 'AdminController@presentInvestorInteractions'));


Route::get('signup', 'AuthController@getSignup');
Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');
Route::post('password/remind', 'AuthController@sendPasswordReminder');
Route::get('password/remind', 'AuthController@getPasswordReminder');
Route::get('password/reset/{token}', 'AuthController@getResetPassword');
Route::post('password/reset', 'AuthController@postResetPassword');


Route::resource('user', 'UserController', array('only' => array('store')));

//Welcome view
Route::get('/', function()
{
	return View::make('hello');
});

//OTHER PAGES NON AUTH
Route::get('/', 'OtherViewsController@presentStartPage');
Route::get('/faq', 'OtherViewsController@presentFaqPage');
Route::get('/contact', 'OtherViewsController@presentContactPage');
Route::get('/vcs', 'OtherViewsController@presentInvestorPage');
Route::get('/youtubeInformation', 'OtherViewsController@presentYoutubeInformation');
Route::get('/toa', 'OtherViewsController@presentTermsOfAgreement');

/* ---- END OF NON AUTH ---- */

/*
Route::get('/users', function()
{
    $users = User::all();

    return View::make('users')->with('users', $users);
});

Route::get('/users', function()
{
     $users = User::all();

    return View::make('users')->with('users', $users);
});
*/
//Route::controller('users', 'UserController');


Route::post('/ipn', function() 
{
	$listener = new IpnListener();
	//$listener->use_sandbox = true;
	Log::info('were inside ipn');
	try {
		$verified = $listener->processIpn();
		Log::info('trying to process');
	} catch (Exception $e) {
		Log::error('paypalprocess Error :((' . $e);
		exit(0);
	}

	if ($verified) {
		$data = $_POST;

		$pitch_id = $data['custom'];
		$settings = Settings::all()->last();
 	//Log::info('pitch id is currently: ' . $pitch_id);
 	//Log::info('The data that should be in the model: ' . $data['txn_id'] . ' --- ' . $pitch_id . ' --- ' . $data['payer_id'] . ' --- ' . $settings->currentRound);

		$paymentSuccess = $data['payment_status'] == 'Completed';
		Log::info(' Payment status is: ' . $data['payment_status'] . ' AND paymentSuccess is : ' . $paymentSuccess);


 	$payment = Payment::create(array(
    'transaction_id' => $data['txn_id'],
    'pitch_id' => $pitch_id,
    'paypal_profile_id' => $data['payer_id'],
    'round' => $settings->currentRound,
    'payment_success' => $paymentSuccess
    ));

 
    //Payment::create($transaction);
    
	} else {
		Log::info('verification failed buuu :(');
	}
});