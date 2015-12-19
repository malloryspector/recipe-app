@extends('layouts.master')

@section('title')
  Edit Recipe
@stop

@section('styling')
  <link href="/css/recipe.css" rel="stylesheet">
@stop

@section('content')
  <h1>Edit Recipe</h1>

  <form method="POST" action="/recipe/edit">
    <div>
      @if(count($errors) > 0)
          @foreach ($errors->all() as $error)
            {{ $error }}<br>
          @endforeach
      @endif
      <br>
    </div>
    <input type='hidden' value='{{ csrf_token() }}' name='_token' >
    <input type='hidden' name='id' value='{{ $recipe->id }}' >
    {{-- Recipe Name --}}
    <div class="form-group">
      <label for="recipe_name">Recipe Name:</label>
      <input type="text" class="form-control" id="recipe_name" name="recipe_name" value="{{ old('recipe_name', $recipe->recipe_name) }}">
    </div>
    {{-- Ingredients --}}
    <div class="form-group" id="ingredient">
      <div class="row">
        <div class="col-sm-6">
          <label for="ingredient_name">Ingredient Name:</label>
        </div>
        <div class="col-sm-1">
          <label for="quantity_whole">Quantity:</label>
        </div>
        <div class="col-sm-2">
          <label for="quantity_part">&nbsp</label>
        </div>
        <div class="col-sm-2">
          <label for="unit">Unit:</label>
        </div>
      </div>

      @foreach($ingredients as $ingredient)
        <div class="row">
          <div class="col-sm-6">
              <input type="text" class="form-control" id="ingredient_name" name="ingredient_name[]" value="{{ $ingredient->ingredient_name }}">
          </div>
          <div class="col-sm-1">
              <select class="form-control" id="quantity_whole" name="quantity_whole[]">
                <option {{ $selected = ($ingredient->quantity_whole == 0) ? 'selected' : '' }} value="0" {{ $selected }}>0</option>
                <option {{ $selected = ($ingredient->quantity_whole == 1) ? 'selected' : '' }} value="1" {{ $selected }}>1</option>
                <option {{ $selected = ($ingredient->quantity_whole == 2) ? 'selected' : '' }} value="2" {{ $selected }}>2</option>
                <option {{ $selected = ($ingredient->quantity_whole == 3) ? 'selected' : '' }} value="3" {{ $selected }}>3</option>
                <option {{ $selected = ($ingredient->quantity_whole == 4) ? 'selected' : '' }} value="4" {{ $selected }}>4</option>
                <option {{ $selected = ($ingredient->quantity_whole == 5) ? 'selected' : '' }} value="5" {{ $selected }}>5</option>
              </select>
          </div>
          <div class="col-sm-2">
              <select class="form-control" id="quantity_part" name="quantity_part[]">
                <option {{ $selected = ($ingredient->quantity_part == 0) ? 'selected' : '' }} value="0" {{ $selected }}>0</option>
                <option {{ $selected = ($ingredient->quantity_part == '1/8') ? 'selected' : '' }} value="&frac18;" {{ $selected }}>1/8</option>
                <option {{ $selected = ($ingredient->quantity_part == '1/4') ? 'selected' : '' }} value="&frac14;" {{ $selected }}>1/4</option>
                <option {{ $selected = ($ingredient->quantity_part == '3/8') ? 'selected' : '' }} value="&frac38;" {{ $selected }}>3/8</option>
                <option {{ $selected = ($ingredient->quantity_part == '1/2') ? 'selected' : '' }} value="&frac12;" {{ $selected }}>1/2</option>
                <option {{ $selected = ($ingredient->quantity_part == '5/8') ? 'selected' : '' }} value="&frac58;" {{ $selected }}>5/8</option>
                <option {{ $selected = ($ingredient->quantity_part == '3/4') ? 'selected' : '' }} value="&frac34;" {{ $selected }}>3/4</option>
                <option {{ $selected = ($ingredient->quantity_part == '7/8') ? 'selected' : '' }} value="&frac78;" {{ $selected }}>7/8</option>
              </select>
          </div>
          <div class="col-sm-2">
              <select class="form-control" id="unit" name="unit[]">
                <option {{ $selected = ($ingredient->unit == 'teaspoon') ? 'selected' : '' }} value="teaspoon" {{ $selected }}>teaspoon</option>
                <option {{ $selected = ($ingredient->unit == 'tablespoon') ? 'selected' : '' }} value="tablespoon" {{ $selected }}>tablespoon</option>
                <option {{ $selected = ($ingredient->unit == 'ounce') ? 'selected' : '' }} value="ounce" {{ $selected }}>ounce</option>
                <option {{ $selected = ($ingredient->unit == 'cup') ? 'selected' : '' }} value="cup" {{ $selected }}>cup</option>
                <option {{ $selected = ($ingredient->unit == 'pound') ? 'selected' : '' }} value="pound" {{ $selected }}>pound</option>
                <option {{ $selected = ($ingredient->unit == 'piece') ? 'selected' : '' }} value="piece" {{ $selected }}>piece</option>
                <option {{ $selected = ($ingredient->unit == 'stalk') ? 'selected' : '' }} value="stalk" {{ $selected }}>stalk</option>
                <option {{ $selected = ($ingredient->unit == 'pinch') ? 'selected' : '' }} value="pinch" {{ $selected }}>pinch</option>
                <option {{ $selected = ($ingredient->unit == 'dash') ? 'selected' : '' }} value="dash" {{ $selected }}>dash</option>
                <option {{ $selected = ($ingredient->unit == 'bunch') ? 'selected' : '' }} value="bunch" {{ $selected }}>bunch</option>
                <option {{ $selected = ($ingredient->unit == 'clove') ? 'selected' : '' }} value="clove" {{ $selected }}>clove</option>
                <option {{ $selected = ($ingredient->unit == 'can') ? 'selected' : '' }} value="can" {{ $selected }}>can</option>
              </select>
          </div>
          <div class="col-sm-1 delete_ingredient">
            <a href="#">Delete</a>
          </div>
        </div>
      @endforeach
    </div>
    <a class="btn-sm" href="#" id="add_ingredient">Add another ingredient</a><br><br>
    {{-- Directions --}}
    <div class="form-group">
      <label for="directions">Directions:</label>
      <textarea type="text" rows="5" class="form-control" id="directions" name="directions">{{ old('directions', $recipe->directions) }}</textarea>
    </div>
    {{-- Time to Cook --}}
    <div class="form-group">
      <div class="row">
        <div class="col-sm-2">
          <label for="prep_time">Prep Time (in minutes):</label>
          <input type="text" class="form-control" id="prep_time" name="prep_time" value="{{ old('prep_time', $recipe->prep_time) }}">
        </div>
        <div class="col-sm-2">
          <label for="cook_time">Cook Time (in minutes):</label>
          <input type="text" class="form-control" id="cook_time" name="cook_time" value="{{ old('cook_time', $recipe->cook_time) }}">
        </div>
      </div>
    </div>
    <button type="submit" class="btn">Save Changes</button>
  </form>
@stop
