@extends('layouts.scaffold')
@section('main')

<?php
$xml = "<List>
            <FAQ>
                <Question>What am I paying for?</Question>
                <Answer>You pay because you want to have a chance of getting your pitch to a bunch of decision making, Silicon Valley, venture capitalists. With lots of money. Super lots.</Answer>
            </FAQ>
            <FAQ>
                <Question>How many VCs will watch my pitch?</Question>
                <Answer>See our VC page for the VCs that are guaranteed to watch your video.</Answer>
            </FAQ>
            <FAQ>
                <Question>Which pitches will be chosen?</Question>
                <Answer>A panel will rate all the pitches. The winning one, as well as one random pick of top 20, will be presented to the VCs every round.</Answer>
            </FAQ>
            <FAQ>
                <Question>What information do you want from me?</Question>
                <Answer>A one minute pitch video, contact information and the amount of money you are looking for is enough at first.</Answer>
            </FAQ>
            <FAQ>
                <Question>Am I guaranteed to get funding?</Question>
                <Answer>No. We promises only that they will watch the chosen videos, not what they think of it.</Answer>
            </FAQ>
            <FAQ>
                <Question>Who will have access to my pitch?</Question>
                <Answer>The VCs on this page and anyone they think might be interested in the idea. For more info, visit the investor page for more information. }}</Answer>
            </FAQ>
            <FAQ>
                <Question>How many pitches do I compete against?</Question>
                <Answer>The limit can be different each week. The amount of spots left will be shown inside your profile page, so keep your eye out if you want to increase your chances. Since of course the less pitches, the better your chances are.</Answer>
            </FAQ>
            <FAQ>
                <Question>What if my questions is not listed hre?</Question>
                <Answer>Give us a holler at our email, and we'll respond as swiftly as possible!</Answer>
            </FAQ>
        </List>";


$xml = simplexml_load_string($xml);
$arr = array();
?>
<div class='narrowContainer faq'>
    <h1>Frequently Asked Questions</h1>

	@foreach($xml->FAQ as $faq)
	    <div class="row">
	    <h4>{{ $faq->Question }}</h4>
	    {{ $faq->Answer}}
	    </div>
	@endforeach
</div> <!-- main container -->
<br>

@stop
