@extends('layouts.scaffold')

@section('main')

<h1>Register</h1>

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

<div class='container'>
{{ Form::open(array('route' => 'user.store')) }}
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
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}
		</li>
		<li>
			{{ Form::submit('Submit', array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}
</div>



@stop