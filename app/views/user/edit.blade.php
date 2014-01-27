@extends('layouts.scaffold')

@section('main')

<?php $user->makeSureThisUserIsLoggedIn(); ?>

<h1>Edit user</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('user.update', $user->id))) }}

{{ Form::hidden('accepted_terms', '1') }}
{{ Form::hidden('password', $user->password) }}
{{ Form::hidden('password_confirmation', $user->password) }}

   <ul>
		<li>
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email') }}
		</li>
		<li>
			{{ Form::label('fname', ' First Name:') }}
			{{ Form::text('fname') }}
		</li>
		<li>
			{{ Form::label('lname', 'Last Name:') }}
			{{ Form::text('lname') }}
		</li>
		<li>
			{{ Form::label('tel', 'Telephone:') }}
			{{ Form::text('tel') }}
		</li>
		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{link_to_route('user.index', 'Cancel', array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop