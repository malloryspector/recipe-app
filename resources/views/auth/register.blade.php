@extends('layouts.master')

@section('title')
  Register
@stop

@section('styling')
  <link href="/css/welcome.css" rel="stylesheet">
@stop

@section('content')
  <div class="welcome_container col-sm-3">

    <h1>New account?</h1>
    <h3>Sign up below</h3>

    <form method='POST' action='/register'>
      <div>
        @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
              {{ $error }}<br>
            @endforeach
        @endif
        <br>
      </div>
      <input type='hidden' value='{{ csrf_token() }}' name='_token' >
      <div class="form-group">
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
      </div><br>
      <button type="submit" class="btn">Register</button>
    </form
  </div>
@stop
