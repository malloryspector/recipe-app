@extends('layouts.master')

@section('title')
  Login
@stop

@section('content')
  <h1>Login</h1>

  <form method='POST' action='/login'>
    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
          {{ $error }}
        @endforeach
    @endif
    <input type='hidden' value='{{ csrf_token() }}' name='_token' >
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
@stop
