@extends('layouts.scaffold')
@section('main')

<?php $numberLeft = Settings::all()->last()->pitchesLeft(); ?>

<?php $user = Auth::user(); ?>
<h2>{{ $user->fname }} {{ $user->lname }} {{ link_to_route('user.edit', 'Edit profile', array('user' => $user->id), array('class' => 'btn btn-info')) }}</h2>
<p>
<p><strong>Email:</strong> {{$user->email}}</p> 
<p><strong>Telephone:</strong> {{$user->tel}}</p> 
</p>
<br />
<p>{{ link_to_route('pitches.index','Manage Pitches', array(), array('class' => 'btn btn-danger')) }} &nbsp; Amount of pitches left: {{ $numberLeft }}
</p>
<p></p>

@stop
