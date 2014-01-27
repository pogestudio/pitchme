@extends('layouts.scaffold')

@section('main')
<div class="narrowContainer">
	<div class='container'>
		{{ Form::open(array('route' => 'user.store', 'class' => 'form .form-horizontal signupForm')) }}
		<h1>Register</h1>

		@if ($errors->any())
			<ul>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</ul>
		@endif
		<p>
			{{ Form::label('email', 'E-mail: ') }}
			{{ Form::text('email', '', array('class'=>'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'The email you wish to use when signing up')) }}
		</p>
		<p>
			{{ Form::label('fname', ' First Name: ') }}
			{{ Form::text('fname', '', array('class'=>'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Your first name')) }}
		</p>
		<p>
			{{ Form::label('lname', 'Last Name: ') }}
			{{ Form::text('lname', '', array('class'=>'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Your last name')) }}
		</p>
		<p>
			{{ Form::label('tel', 'Telephone: ') }}
			{{ Form::text('tel', '', array('class'=>'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'If you want to allow investors to reach you through phone, enter your phone number including country code')) }}
		</p>
		<p>
			{{ Form::label('password', 'Password: ') }}
			{{ Form::password('password', array('class'=>'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'The password must contain at least six (6) characters')) }}
		</p>
		<p>
			{{ Form::label('password_confirmation', 'Confirm password: ') }}
			{{ Form::password('password_confirmation', array('class'=>'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Confirm the password')) }}
		</p>
		<p> {{Form::checkbox('accepted_terms', 1, false, array('class'=>'check', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Basically, you allow Pitch.XXX and our signed up investors to watch your video. If investors find the idea interesting, they may forward it to more suitable investors in their network.')) }} <strong>I accept Pitch.XXX's {{link_to('toa', 'Terms and Agreements', array('target' => '_blank'))}}.</strong>
		</p>
		{{ Form::submit('Submit', array('class' => 'btn btn-primary signupButton')) }}
		{{ Form::close() }}
	</div>
</div>
@stop