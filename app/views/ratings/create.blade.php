@extends('layouts.scaffold')

@section('main')

<h1>Create Rating</h1>

{{ Form::open(array('route' => 'ratings.store')) }}
    <ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('rating', 'Rating:') }}
            {{ Form::text('rating') }}
        </li>

        <li>
            {{ Form::label('pitch_id', 'Pitch_id:') }}
            {{ Form::input('number', 'pitch_id') }}
        </li>

        <li>
            {{ Form::label('feedback', 'Feedback:') }}
            {{ Form::text('feedback') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


