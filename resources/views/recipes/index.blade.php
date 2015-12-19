@extends('layouts.master')

@section('title')
  My Recipes
@stop

@section('styling')
  <link href="/css/recipe.css" rel="stylesheet">
@stop

@section('content')
  <div class="col-sm-6 col-sm-offset-3 center">
    <h1>{{ $name }}'s Recipes</h1><br>

    @if(sizeof($recipes) == 0)
      <p>You have no recipes saved. <a class="btn-sm" href="/recipe/create">Add a recipe</a> to get started!</p>
    @else
      @foreach($recipes as $recipe)
        <div>
          <h3>{{ $recipe->recipe_name }}</h4>
          <p>
            <a class="btn-sm" href="/recipe/show/{{ $recipe->id }}">View</a>
            <a class="btn-sm" href="/recipe/edit/{{ $recipe->id }}">Edit</a>
            <a class="btn-sm" href="/recipe/delete/{{ $recipe->id }}">Delete</a>
          </p><br>
        </div>
      @endforeach
    @endif

  </div>
@stop
