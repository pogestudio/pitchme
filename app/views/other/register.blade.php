@extends('layouts.scaffold')
@section('main')
    <div class="register">
    <h1>Register</h1>
    <br />
    @if ($errors->any())
       <ul>
           {{ implode('', $errors->all('<p class="error">:message</p>')) }}
       </ul>
    @endif
    {{ Form::open(array('route' => 'user.store', 'class' => 'form .form-horizontal')) }}
           <p>
               {{ Form::label('email', 'Email:') }}
               {{ Form::text('email') }}
           </p>
           <p>
               {{ Form::label('fname', ' First Name:') }}
               {{ Form::text('fname') }}
           </p>
           <p>
               {{ Form::label('lname', 'Last Name:') }}
               {{ Form::text('lname') }}
           </p>
           <p>
               {{ Form::label('password', 'Password:') }}
               {{ Form::password('password') }}
           </p>
           <p>
               {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
           </p>
    {{ Form::close() }}
    </div>
@stop
