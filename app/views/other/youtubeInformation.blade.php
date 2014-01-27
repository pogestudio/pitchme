@extends('layouts.scaffold')

@section('main')

<h1>YouTube Information</h1>

<div class="container">
    <div class="row">
    <h3>YouTube ID</h3>
    The YouTube ID is a unique string of text that represents your video on the YouTube site. We use it whenever we want to rate your pitch, or show it to investors.
    <br>
    {{ link_to('http://answers.yahoo.com/question/index?qid=20101205103427AAbUt4b', 'Instructions for how to find the ID',array('target'=>'_blank')) }} <br>
    {{ link_to('http://www.youtube.com/watch?v=EKyirtVHsK0', 'Video explaining how to find the ID',array('target'=>'_blank')) }}
    </div>
    <div class="row">
    <h3>Privacy Levels</h3>
    </div>
    <div class="row">
    YouTube offers three privacy levels for your video.
    <ul>
    <li>Public</li>
    <li>Unlisted</li>
    <li>Private</li>
    </ul>
    When entering the Pitch.XXX competition you have to choose either <b>Public</b> or <b>Unlisted</b>, otherwise it will be disqualified. Please see     {{ link_to('https://support.google.com/youtube/answer/157177?hl=en', 'YouTubes Privacy Settings',array('target'=>'_blank')) }} for more information.
    </div>
</div>

@stop


