@extends('layouts.scaffold')
@section('main')

<h1>Edit Pitch</h1>
{{ Form::model($pitch, array('method' => 'PATCH', 'route' => array('pitches.update', $pitch->id))) }}
    <ul>
        <li>
            {{ Form::hidden('user_id', Auth::user()->id) }}

            {{ Form::label('company_name', 'Company name:') }}
            {{ Form::text('company_name') }}
        </li>
        <li>
            {{ Form::label('video_url', 'Vimeo Video ID:') }}
            {{ Form::text('video_url') }}
        </li>

        <li>
            {{ Form::label('investment_size', 'Investment size:') }}
            {{ Form::text('investment_size') }}
        </li>
        <li>
            {{ Form::label('allow_public', 'Allow public use:') }}
            {{ Form::checkbox('allow_public', true) }}
        </li>
        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('pitches.index', 'Cancel', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop