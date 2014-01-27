<?php

class AdminController extends BaseController {

	public function createWinners()
    {
        Auth::user()->makeSureUserIsAdmin();
        $latestWinner = Winner::orderBy('round','desc')->first();

        if ($latestWinner && ($latestWinner->round == Settings::all()->last()->currentRound)) {
            return View::make('adminPage')->with('message', 'Winners already exist, retttard');
        } else {
            Admin::createWinnersFromRound();
            return View::make('adminPage')->with('message', 'Winners created!');
        }
    }

    public function rankPitches()
    {
        Auth::user()->makeSureUserIsAdmin();
        Admin::rankAllPitches();
        return View::make('adminPage');
    }

    public function presentAdminPage()
    {
        Auth::user()->makeSureUserIsAdmin();
        return View::make('adminPage');
    }

    public function presentInvestorInteractions()
    {
        Auth::user()->makeSureUserIsAdmin();

        $interactions = InvestorInteraction::getTableOfInteractions();


        return View::make('investorInteractions')->with('interactions', $interactions);
    }
    
}