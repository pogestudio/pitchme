<?php

class OtherViewsController extends BaseController {

    public function presentStartPage()
    {
        return View::make('other/hello');
    }

    public function presentContactPage()
    {
        return View::make('other/contact');
    }

    public function presentFaqPage()
    {
        return View::make('other/faq');
    }

    public function presentInvestorPage()
    {
        return View::make('other/vcs');
    }
    
    public function presentYoutubeInformation()
    {
        return View::make('other/youtubeInformation');
    }

    public function presentTermsOfAgreement()
    {
        return View::make('other/toa');
    }
}