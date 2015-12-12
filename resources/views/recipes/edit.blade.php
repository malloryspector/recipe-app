@extends('layouts.master')

@section('title')
  Edit Recipe
@stop

@section('content')
  <h1>Edit Recipe</h1>

  <form method="POST" action="/recipe/edit">
    <input type='hidden' value='{{ csrf_token() }}' name='_token' >
    <input type='hidden' name='id' value='{{ $recipe->id }}' >
    {{-- Recipe Name --}}
    <div class="form-group">
      <label for="recipe_name">Recipe Name:</label>
      <input type="text" class="form-control" id="recipe_name" name="recipe_name" value="{{ $recipe->recipe_name }}">
    </div>
    {{-- Ingredients --}}
    <div class="form-group" id="ingredient">
      <div class="row">
        <div class="col-sm-8">
          <label for="ingredient_name">Ingredient Name:</label>
          @foreach($ingredients as $ingredient)
            <input type="text" class="form-control" id="ingredient_name" name="ingredient_name[]" value="{{ $ingredient->ingredient_name }}"><br>
          @endforeach
        </div>
        <div class="col-sm-1">
          <label for="quantity_whole">Quantity:</label>
          @foreach($ingredients as $ingredient)
            <select class="form-control" id="quantity_whole" name="quantity_whole[]">
              <option {{ $selected = ($ingredient->quantity_whole == 0) ? 'selected' : '' }} value="0" {{ $selected }}>0</option>
              <option {{ $selected = ($ingredient->quantity_whole == 1) ? 'selected' : '' }} value="1" {{ $selected }}>1</option>
              <option {{ $selected = ($ingredient->quantity_whole == 2) ? 'selected' : '' }} value="2" {{ $selected }}>2</option>
              <option {{ $selected = ($ingredient->quantity_whole == 3) ? 'selected' : '' }} value="3" {{ $selected }}>3</option>
              <option {{ $selected = ($ingredient->quantity_whole == 4) ? 'selected' : '' }} value="4" {{ $selected }}>4</option>
              <option {{ $selected = ($ingredient->quantity_whole == 5) ? 'selected' : '' }} value="5" {{ $selected }}>5</option>
            </select><br>
          @endforeach
        </div>
        <div class="col-sm-1">
          <label for="quantity_part">&nbsp</label>
          @foreach($ingredients as $ingredient)
            <select class="form-control" id="quantity_part" name="quantity_part[]">
              <option {{ $selected = ($ingredient->quantity_part == 0) ? 'selected' : '' }} value="0" {{ $selected }}></option>
              <option {{ $selected = ($ingredient->quantity_part == '1/8') ? 'selected' : '' }} value="1/8" {{ $selected }}>1/8</option>
              <option {{ $selected = ($ingredient->quantity_part == '1/4') ? 'selected' : '' }} value="1/4" {{ $selected }}>1/4</option>
              <option {{ $selected = ($ingredient->quantity_part == '3/8') ? 'selected' : '' }} value="3/8" {{ $selected }}>3/8</option>
              <option {{ $selected = ($ingredient->quantity_part == '1/2') ? 'selected' : '' }} value="1/2" {{ $selected }}>1/2</option>
              <option {{ $selected = ($ingredient->quantity_part == '5/8') ? 'selected' : '' }} value="5/8" {{ $selected }}>5/8</option>
              <option {{ $selected = ($ingredient->quantity_part == '3/4') ? 'selected' : '' }} value="3/4" {{ $selected }}>3/4</option>
              <option {{ $selected = ($ingredient->quantity_part == '7/8') ? 'selected' : '' }} value="7/8" {{ $selected }}>7/8</option>
            </select><br>
          @endforeach
        </div>
        <div class="col-sm-2">
          <label for="unit">Unit:</label>
          @foreach($ingredients as $ingredient)
            <select class="form-control" id="unit" name="unit[]">
              <option {{ $selected = ($ingredient->unit == 'tsp') ? 'selected' : '' }} value="tsp" {{ $selected }}>tsp</option>
              <option {{ $selected = ($ingredient->unit == 'tbsp') ? 'selected' : '' }} value="tbsp" {{ $selected }}>tbsp</option>
              <option {{ $selected = ($ingredient->unit == 'oz') ? 'selected' : '' }} value="oz" {{ $selected }}>oz</option>
              <option {{ $selected = ($ingredient->unit == 'cup') ? 'selected' : '' }} value="cup" {{ $selected }}>cup</option>
              <option {{ $selected = ($ingredient->unit == 'pound') ? 'selected' : '' }} value="pound" {{ $selected }}>pound</option>
            </select><br>
          @endforeach
        </div>
      </div>
    </div>
    <a href="#" id="add_ingredient">Add another ingredient</a>
    {{-- Directions --}}
    <div class="form-group">
      <label for="directions">Directions:</label>
      <textarea type="text" rows="5" class="form-control" id="directions" name="directions">{{ $recipe->directions }}</textarea>
    </div>
    {{-- Time to Cook --}}
    <div class="form-group">
      <div class="row">
        <div class="col-sm-2">
          <label for="prep_time">Prep Time (in minutes):</label>
          <input type="text" class="form-control" id="prep_time" name="prep_time" value="{{ $recipe->prep_time }}">
        </div>
        <div class="col-sm-2">
          <label for="cook_time">Cook Time (in minutes):</label>
          <input type="text" class="form-control" id="cook_time" name="cook_time" value="{{ $recipe->cook_time }}">
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
@stop
