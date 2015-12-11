@extends('layouts.master')

@section('title')
  {{ $recipe->recipe_name }}
@stop

@section('content')
  <h4>{{ $recipe->recipe_name }}</h4>
  <p>{{ $recipe->directions }}</p>
  @foreach($ingredients as $ingredient)
    <p>{{ $ingredient->quantity_whole . ' ' . $ingredient->quantity_part . ' ' . $ingredient->unit . ' ' . $ingredient->ingredient_name }}</p>
  @endforeach
  <p>{{ $recipe->prep_time }}</p>
  <p>{{ $recipe->cook_time }}</p>
@stop
