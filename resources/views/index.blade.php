@extends('layouts.master')

@section('title')
  Digital Recipe Box
@stop

@section('styling')
  <link href="/css/welcome.css" rel="stylesheet">
@stop

@section('content')
  <div class="welcome_container col-sm-4">
    <h1>One place to keep all your favorite meals</h3><br>
    <a href="/login" class="btn">Log In</a>&nbsp&nbsp
    <a href="/register" class="btn">Register</a>
  </div>
@stop
