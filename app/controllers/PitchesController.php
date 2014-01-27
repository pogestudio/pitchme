<?php

class PitchesController extends BaseController {

    /**
     * Pitch Repository
     *
     * @var Pitch
     */
    protected $pitch;

    public function __construct(Pitch $pitch)
    {
        $this->pitch = $pitch;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $query = 'select * from pitches where user_id = ' . Auth::user()->id;
        $pitches = DB::select($query);

        $successPaymentsYetUnseen = DB::table('payments')
                                        ->where('payment_success','=',true)
                                        ->where('user_has_seen_success','=',false)
                                        ->lists('id');

        if (count($successPaymentsYetUnseen) != 0) {
            foreach ($successPaymentsYetUnseen as $id) {
                $payment = Payment::find($id);
                $payment->user_has_seen_success = true;
                $payment->save();
            }

            $message = 'Thank you for your payment. Your transaction has been completed, and a receipt for your purchase has been emailed to you. You may log into your account at www.paypal.com to view details of this transaction.';
            return View::make('pitches.index')
                            ->with('pitches',$pitches)
                            ->with('message',$message);
        } else 
        {
            return View::make('pitches.index')->with('pitches',$pitches);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('pitches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Pitch::$rules);

        // if ($validation->passes())
        // {
//        $pitch = new Pitch;
  //      $pitch->video_url = $input['video_url'];
    //    $pitch->company_name = $input['company_name'];
      //  $pitch->investment_size = $input['investment_size'];
        //$pitch->user_id = Auth::user()->id;
        if ($validation->passes())
        {
            $this->pitch->create($input);
            Log::info('Pitch is created.. and is allowed? ' . $this->pitch->allow_public);

            return Redirect::to('pitches');
        }

        return Redirect::route('pitches.create')
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

        Log::info('want to get into show id');
        $pitch = $this->pitch->findOrFail($id);
        
        $pitch->makeSurePitchOwnerIsLoggedIn();

        return View::make('pitches.show')->with('pitch', $pitch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $pitch = $this->pitch->find($id);

        if (is_null($pitch))
        {
            return Redirect::route('pitches.index');
        }
        
        $pitch->makeSurePitchOwnerIsLoggedIn();

        if(!($pitch->pitchShouldBeEditable()))
        {
            return App::abort(401,'Unauthorized, the pitch should not be editable');
        } else {
            return View::make('pitches.edit', compact('pitch'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {            
        $pitch = $this->pitch->find($id);
        $pitch->makeSurePitchOwnerIsLoggedIn();

        $input = array_except(Input::all(), '_method');

        $validation = Validator::make($input, Pitch::$rules);
        if ($validation->passes())
        {
            $pitch->update($input);
            if (!isset($input['allow_public'])) {
                $pitch->allow_public = false;
            }
            $pitch->save();

            return Redirect::to('pitches');
        }

        return Redirect::route('pitches.edit', $id)
        ->withInput()
        ->withErrors($validation)
        ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $pitch->makeSurePitchOwnerIsLoggedIn();
        $this->pitch->find($id)->delete();
        return Redirect::route('pitches.index');
    }

}