<?php

class RatingsController extends BaseController {

    /**
     * Rating Repository
     *
     * @var Rating
     */
    protected $rating;

    public function __construct(Rating $rating)
    {
        $this->rating = $rating;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ratings = $this->rating->all();

        return View::make('ratings.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('ratings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Rating::$rules);

        if ($validation->passes())
        {
            $this->rating->create($input);

            //every time you want to rate a new pitch.
            return Redirect::to('rateNext');
        }

        return Redirect::route('ratings.create')
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
        $rating = $this->rating->findOrFail($id);

        return View::make('ratings.show', compact('rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $rating = $this->rating->find($id);

        if (is_null($rating))
        {
            return Redirect::route('ratings.index');
        }

        return View::make('ratings.edit', compact('rating'));
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
        $validation = Validator::make($input, Rating::$rules);

        if ($validation->passes())
        {
            $rating = $this->rating->find($id);
            $rating->update($input);

            return Redirect::route('ratings.show', $id);
        }

        return Redirect::route('ratings.edit', $id)
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
        $this->rating->find($id)->delete();

        return Redirect::route('ratings.index');
    }

    public function rateNext()
    {
        $user = Auth::user();
        if ($user->role != 'panel') {
            return 'You do not have authority to access this site, please log in as a Panel Member and try again';
        }

        $ratingRound = Settings::all()->last()->roundThatIsBeingRated;

        //get a list of all pitches paid this round 
        //SELECT pitch_id FROM pitches JOIN payments ON payments.pitch_id = pitches.id WHERE payments.round = RATINGROUND

        //that is not yet rated by this user
            //these are alreay rated
            //SELECT pitch_id AS alreadyRatedIds from ratings where user_id = Auth::user()->id

        //left join that shit to get

        $sql = 'SELECT ShouldBeRated.pitch_id FROM
        (SELECT pitch_id FROM pitches JOIN payments ON payments.pitch_id = pitches.id WHERE payments.round = '.$ratingRound.') AS ShouldBeRated

        LEFT JOIN 
        (SELECT pitch_id FROM ratings WHERE user_id = '.$user->id.') AS UserAlreadyRated

        ON ShouldBeRated.pitch_id = UserAlreadyRated.pitch_id
        WHERE UserAlreadyRated.pitch_id IS NULL';

        $pitches = DB::select($sql);
        $hits = count($pitches);

        if ($hits == 0) {
            return Redirect::to('')->with('success', 'You have rated all pitches this week!');
        }
        $hits = $hits - 1; // 0 indexed

        $theOneIndex = rand(0,$hits);

        Log::info('Hits: ' .$hits);
        Log::info('index: ' .$theOneIndex);

        $theOnePitchId = $pitches[$theOneIndex]->pitch_id;
        return View::make('ratings.ratePitch')->with('pitch_id',$theOnePitchId);

    }

}