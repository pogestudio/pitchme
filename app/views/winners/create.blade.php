@extends('layouts.scaffold')

@section('main')

<h1>Create Winner</h1>

{{ Form::open(array('route' => 'winners.store')) }}
    <ul>
        <li>
            {{ Form::label('round', 'Round:') }}
            {{ Form::input('number', 'round') }}
        </li>

        <li>
            {{ Form::label('rank', 'Rank:') }}
            {{ Form::input('number', 'rank') }}
        </li>

        <li>
            {{ Form::label('pitch_id', 'Pitch_id:') }}
            {{ Form::input('number', 'pitch_id') }}
        </li>

        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
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


