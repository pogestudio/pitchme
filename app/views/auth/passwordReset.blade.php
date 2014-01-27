@extends('layouts.scaffold')
@section('main')

<div class="page-header">
    <h2>Choose new password</h2>
</div>

@if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@endif

{{ Form::open(array('url' => 'password/reset', 'class' => 'form-horizontal')) }}
<p>
    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email') }}
</p>
<p>
    {{ Form::label('password', 'New password:') }}
    {{ Form::password('password',array('title' => 'The password has to have a minimum of six (6) characters') }}
</p>
<p>
    {{ Form::label('password', 'Confirm password:') }}
    {{ Form::password('password_confirmation') }}
</p>
<p>
    {{ Form::submit('Submit', array('class' => 'btn pull-left')) }}
</p>
<p>
	<input type="hidden" name="token" value="{{ $token }}">
</p>
{{ Form::close() }}
@stop