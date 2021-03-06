@extends('layouts.master')

@section('title')
  {{ $recipe->recipe_name }}
@stop

@section('styling')
  <link href="/css/recipe.css" rel="stylesheet">
@stop

@section('content')
  <div class="col-sm-6 col-sm-offset-3">

    <h1>{{ $recipe->recipe_name }}</h1>
    <br>

    <h4>Ingredients</h4>
    @foreach($ingredients as $ingredient)
      <p>{{ ($ingredient->quantity_whole === 0) ? '' : $ingredient->quantity_whole . ' '}}{{ ($ingredient->quantity_part === "0") ? '' : $ingredient->quantity_part . ' '}}{{ $ingredient->unit . ' ' . strtolower($ingredient->ingredient_name) }}</p>
    @endforeach
    <br>

    <h4>Directions</h4>
    <p>{{ $recipe->directions }}</p>
    <br>

    <h4>Prep Time</h4>
    <p>{{ $recipe->prep_time }} minutes</p>
    <br>

    <h4>Cook Time</h4>
    <p>{{ $recipe->cook_time }} minutes</p>

    <br>
    <a class="btn-sm" href="/recipe/edit/{{ $recipe->id }}">Edit recipe</a>
    <a class="btn-sm" href="/recipe/delete/{{ $recipe->id }}">Delete recipe</a>
    <br><br><br>

  </div>
@stop
