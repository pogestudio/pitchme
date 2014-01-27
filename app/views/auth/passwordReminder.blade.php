@extends('layouts.scaffold')
@section('main')

<div class="reminder">
<div class="page-header">
    <h2>Password reset</h2>
</div>

@if (Session::has('error'))
    {{ trans(Session::get('reason')) }}
@elseif (Session::has('success'))
    An e-mail with the password reset has been sent.
@endif

{{ Form::open(array('url' => 'password/remind', 'class' => 'form-horizontal')) }}
<p>
    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email') }} &nbsp;&nbsp;&nbsp;
    {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
</p>
{{ Form::close() }}
</div>
@stop