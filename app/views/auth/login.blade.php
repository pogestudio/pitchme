@extends('layouts.scaffold')
@section('main')
<div class="narrowContainer">
{{ Form::open(array('url' => 'login', 'class' => 'form-horizontal loginForm')) }}
    <!-- Email -->
    <h2>Login</h2>
    <div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
        {{ Form::label('email', 'E-Mail') }}

        <div class="controls">
            {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'The e-mail you used to sign up')) }}
            {{ $errors->first('email') }}
        </div>
    </div>

    <!-- Password -->
    <div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
        {{ Form::label('password', 'Password') }}

        <div class="controls">
            {{ Form::password('password', array('class'=>'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'The password you used to sign up. It should be at least six (6) characters')) }}
            {{ $errors->first('password') }}
            {{link_to_action('AuthController@getPasswordReminder', 'forgot password?') }}

        </div>
    </div>
    <br />
    <!-- Login button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Login', array('class' => 'btn btn-primary pull-right')) }}
        </div>
    </div>

{{ Form::close() }}
</div>
@stop