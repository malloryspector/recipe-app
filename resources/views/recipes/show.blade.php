@extends('layouts.master')

@section('title')
  {{ $recipe->recipe_name }}
@stop

@section('content')
  <h4>{{ $recipe->recipe_name }}</h4>
  <p>{{ $recipe->directions }}</p>
  <p>{{ $ingredient->quantity_whole . $ingredient->quantity_part }} &nbsp {{ $ingredient->ingredient_name }}</p>
  <p>{{ $recipe->prep_time }}</p>
  <p>{{ $recipe->cook_time }}</p>
@stop
