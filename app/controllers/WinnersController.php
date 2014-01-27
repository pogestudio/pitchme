<?php

class WinnersController extends BaseController {

    /**
     * Winner Repository
     *
     * @var Winner
     */
    protected $winner;

    public function __construct(Winner $winner)
    {
        $this->winner = $winner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $winners = $this->winner->all();
        return View::make('winners.index', compact('winners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('winners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Winner::$rules);

        if ($validation->passes())
        {
            $this->winner->create($input);

            return Redirect::route('winners.index');
        }

        return Redirect::route('winners.create')
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
        $winner = $this->winner->findOrFail($id);

        return View::make('winners.show', compact('winner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $winner = $this->winner->find($id);

        if (is_null($winner))
        {
            return Redirect::route('winners.index');
        }

        return View::make('winners.edit', compact('winner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Winner::$rules);

        if ($validation->passes())
        {
            $winner = $this->winner->find($id);
            $winner->update($input);

            return Redirect::route('winners.show', $id);
        }

        return Redirect::route('winners.edit', $id)
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
        $this->winner->find($id)->delete();

        return Redirect::route('winners.index');
    }

    public function getWinners()
    {
        $user = Auth::user();
        if ($user->role != 'vc') {
            App::abort(401, 'You do not have authority to access this site, please log in as an investor and try again');
        }

         //create interaction for investor
        $interaction = InvestorInteraction::create(array(
            'user_id' => Auth::user()->id,
            'round' => Settings::all()->last()->currentRound,
            ));
        
        return View::make('winners.index');
    }

    public function getTopPitches($round)
    {
        $user = Auth::user();
        if ($user->role != 'vc') {
            App::abort(401, 'You do not have authority to access this site, please log in as an investor and try again');
        }


        //calculate the limit

        $amountOfPitches = DB::table('payments')
                            ->where('round','=',$round)
                            ->where('payment_success','=', true)
                            ->count();

        $topPercentageToBeShown = Settings::all()->last()->topPitchesPercentage;
        $amountOfPitchesToshow = floor( $amountOfPitches * $topPercentageToBeShown );

        $sql = '
        SELECT * FROM
            pitches
        INNER JOIN
            (SELECT pitch_id FROM
                payments
            WHERE
                round = ' . $round . ' AND payment_success = 1) AS paidPitchesFromRound
        ON pitches.id = paidPitchesFromRound.pitch_id
        ORDER BY rank DESC
        LIMIT 0,' . $amountOfPitchesToshow;

        $topPitches = DB::select($sql);


        return View::make('winners/topPitches')->with('round',$round)->with('topPitches',$topPitches);
    }

}