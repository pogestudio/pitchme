<?php

class UserController extends BaseController {

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function create()
    {
        Log::info('in create view!!');
        return View::make('user.create');
    }

        // Edit this:
    public function index()
    {
        Log::info('We are in index!!');

        $users = DB::select('select * from users');
        return View::make('user.index')->with('users',$users);
    }

    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, User::$rules);

        if ($validation->passes())
        {
            $inputWithoutConfirmation = Input::except('password_confirmation');
            $user = $this->user->create($inputWithoutConfirmation);
            $user->password = Hash::make($input['password']);
            $user->save();
            Auth::login($user);
            return  Redirect::to('/profile');
        }

        return Redirect::to('signup')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');

    }

    public function edit($id)
    {
        $user = User::find($id);
        $user->makeSureThisUserIsLoggedIn();

        return View::make('user.edit')->with('user',$user);
    }

    public function show($id)
    {
        $user = User::find($id);
        $user->makeSureThisUserIsLoggedIn();

        return View::make('user.show')->with('user', $user);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::find($id);
        $user->makeSureThisUserIsLoggedIn();

        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, User::$rules);

        if ($validation->passes())
        {
             $user->update($input);
             $user->save();

            
            return Redirect::to('profile');
        }

        return Redirect::route('user.edit', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->makeSureThisUserIsLoggedIn();
        $user->delete();

        return Redirect::Route('user.index');
    }

    public function showProfile()
    {
        return View::make('user/profile');
    }
}