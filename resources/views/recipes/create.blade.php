@extends('layouts.master')

@section('title')
  Create Recipe
@stop

@section('content')
  <h1>Add Recipe</h1>

  <form method="POST" action="/recipe/create">
    <input type='hidden'value='{{ csrf_token() }}' name='_token' >
    {{-- Recipe Name --}}
    <div class="form-group">
      <label for="recipe_name">Recipe Name:</label>
      <input type="text" class="form-control" id="recipe_name" name="recipe_name" value="">
    </div>
    {{-- Ingredients --}}
    <div class="form-group">
      <div class="row">
        <div class="col-sm-8">
          <label for="ingredient_name">Ingredient Name:</label>
          <input type="text" class="form-control" id="ingredient_name" name="ingredient_name" value="">
        </div>
        <div class="col-sm-1">
          <label for="quantity_whole">Quantity:</label>
          <select class="form-control" id="quantity_whole" name="quantity_whole">
            <option value="0"></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="col-sm-1">
          <label for="quantity_part">&nbsp</label>
          <select class="form-control" id="quantity_part" name="quantity_part">
            <option value="0"></option>
            <option value="1/8">1/8</option>
            <option value="1/4">1/4</option>
            <option value="3/8">3/8</option>
            <option value="1/2">1/2</option>
            <option value="5/8">5/8</option>
            <option value="3/4">3/4</option>
            <option value="7/8">7/8</option>
          </select>
        </div>
        <div class="col-sm-2">
          <label for="unit">Unit:</label>
          <select class="form-control" id="unit" name="unit">
            <option value="tsp">tsp</option>
            <option value="tbsp">tbsp</option>
            <option value="oz">oz</option>
            <option value="cup">cup</option>
            <option value="pound">pound</option>
          </select>
        </div>
      </div>
    </div>
    {{-- Directions --}}
    <div class="form-group">
      <label for="directions">Directions:</label>
      <textarea type="text" rows="5" class="form-control" id="directions" name="directions" value=""></textarea>
    </div>
    {{-- Time to Cook --}}
    <div class="form-group">
      <div class="row">
        <div class="col-sm-2">
          <label for="prep_time">Prep Time (in minutes):</label>
          <input type="text" class="form-control" id="prep_time" name="prep_time" value="">
        </div>
        <div class="col-sm-2">
          <label for="cook_time">Cook Time (in minutes):</label>
          <input type="text" class="form-control" id="cook_time" name="cook_time" value="">
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
@stop
