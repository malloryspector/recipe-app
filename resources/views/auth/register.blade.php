@extends('layouts.master')

@section('title')
  Register
@stop

@section('content')
  <h1>Register</h1>

  <form method='POST' action='/register'>
    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
          {{ $error }}
        @endforeach
    @endif
    <input type='hidden' value='{{ csrf_token() }}' name='_token' >
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
      <label for="password_confirmation">Confirm Password:</label>
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
@stop
