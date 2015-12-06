@extends('layouts.master')

@section('title')
  My Recipes
@stop

@section('content')
  <h1>My Recipes</h1>

  @if(sizeof($recipes) == 0)
    <p>You have no recipes</p>
  @else
    @foreach($recipes as $recipe)
      <div>
        <h4>{{ $recipe->recipe_name }}</h4>
        <p><a href="/recipe/show/{{ $recipe->id }}">View</a> | <a href="/recipe/edit/{{ $recipe->id }}">Edit</a> | <a href="/recipe/delete/{{ $recipe->id }}">Delete</a></p>
      </div>
    @endforeach
  @endif
@stop
