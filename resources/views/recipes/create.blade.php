@extends('layouts.master')

@section('title')
  Create Recipe
@stop

@section('styling')
  <link href="/css/recipe.css" rel="stylesheet">
@stop

@section('content')

  <h1>Add Recipe</h1>

  <form method="POST" action="/recipe/create">
    <div>
      @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
          {{ $error }}<br>
        @endforeach
      @endif
      <br>
    </div>
    <input type='hidden'value='{{ csrf_token() }}' name='_token' >
    {{-- Recipe Name --}}
    <div class="form-group">
      <label for="recipe_name">Recipe Name:</label>
      <input type="text" class="form-control" id="recipe_name" name="recipe_name" value="{{ old('recipe_name', '') }}">
    </div>
    {{-- Ingredients --}}
    <div class="form-group" id="ingredient">
      <div class="row">
        <div class="col-sm-6">
          <label for="ingredient_name">Ingredient Name:</label>
        </div>
        <div class="col-sm-3">
          <label for="quantity_whole">Quantity: (ex. 1 &frac12;)</label>
        </div>
        <div class="col-sm-2">
          <label for="unit">Unit:</label>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <input type="text" class="form-control" id="ingredient_name" name="ingredient_name[]">
        </div>
        <div class="col-sm-1">
          <select class="form-control" id="quantity_whole" name="quantity_whole[]">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="col-sm-2">
          <select class="form-control" id="quantity_part" name="quantity_part[]">
            <option value="0">0</option>
            <option value="&frac18;">1/8</option>
            <option value="&frac14;">1/4</option>
            <option value="&frac38;">3/8</option>
            <option value="&frac12;">1/2</option>
            <option value="&frac58;">5/8</option>
            <option value="&frac34;">3/4</option>
            <option value="&frac78;">7/8</option>
          </select>
        </div>
        <div class="col-sm-2">
          <select class="form-control" id="unit" name="unit[]">
            <option value="teaspoon">teaspoon</option>
            <option value="tablespoon">tablespoon</option>
            <option value="ounce">ounce</option>
            <option value="cup">cup</option>
            <option value="pound">pound</option>
          </select>
        </div>
        <div class="col-sm-1 delete_ingredient">
        </div>
      </div>
    </div>
    <a class="btn-sm" href="#" id="add_ingredient">Add another ingredient</a><br><br>
    {{-- Directions --}}
    <div class="form-group">
      <label for="directions">Directions:</label>
      <textarea type="text" rows="5" class="form-control" id="directions" name="directions">{{ old('directions', '') }}</textarea>
    </div>
    {{-- Time to Cook --}}
    <div class="form-group">
      <div class="row">
        <div class="col-sm-2">
          <label for="prep_time">Prep Time:</label>
          <input type="text" class="form-control" id="prep_time" name="prep_time" value="{{ old('prep_time', '') }}" placeholder="(in minutes)">
        </div>
        <div class="col-sm-2">
          <label for="cook_time">Cook Time:</label>
          <input type="text" class="form-control" id="cook_time" name="cook_time" value="{{ old('cook_time', '') }}" placeholder="(in minutes)">
        </div>
      </div>
    </div>
    <button type="submit" class="btn">Save Changes</button>
  </form>
@stop
