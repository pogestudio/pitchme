@extends('layouts.scaffold')

@section('main')

<h1>Create a Pitch</h1>
<br />
<div class="container faq">
@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif
{{ Form::open(array('route' => 'pitches.store')) }}
    <ul>
        <li data-toggle='tooltip' data-placement='right' title='The name of your company, product or service you wish to present'>
            {{ Form::hidden('user_id', Auth::user()->id) }}

            {{ Form::label('company_name', 'Company name: ') }}
            {{ Form::text('company_name') }} <!-- array('data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'The name of your company, product or service you wish to present')) }} -->
        </li>
        <li data-toggle='tooltip' data-placement='right' title='The YouTube ID of your pitch' >
            {{ Form::label('video_url', 'YouTube ID: ') }}
            {{ Form::text('video_url') }}
        </li>
        <li data-toggle='tooltip' data-placement='right' title='The amount of money that you are asking for. This is not exact, but the investors should be aware of if you want $10,000 or $300,000 to get to the next milestone.'>
            {{ Form::label('investment_size', 'Investment size: ') }}
            {{ Form::text('investment_size') }}
        </li>
        <li data-toggle='tooltip' data-placement='right' title='Allow Pitch.XXX to promote your video through our channels.'>
            {{ Form::label('allow_public', 'Allow public use: ') }}
            {{ Form::checkbox('allow_public', 1, true) }}
        </li>
        <div class="row">
            {{ link_to('/youtubeInformation', 'Information about YouTube ID and Video Privacy levels',array('target'=>'_blank')) }}
        </div>
        <br />
        <div class="row">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
        </div>
    </ul>
{{ Form::close() }}
</div>

@stop


