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
          <label for="ingredient_qty_whole">Quantity:</label>
          <select class="form-control" id="ingredient_qty_whole" name="ingredient_qty_whole">
            <option value="0"></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="col-sm-1">
          <label for="ingredient_qty_part">&nbsp</label>
          <select class="form-control" id="ingredient_qty_part" name="ingredient_qty_part">
            <option value="0"></option>
            <option value="1">1/8</option>
            <option value="2">1/4</option>
            <option value="3">3/8</option>
            <option value="4">1/2</option>
            <option value="5">5/8</option>
            <option value="6">3/4</option>
            <option value="7">7/8</option>
          </select>
        </div>
        <div class="col-sm-2">
          <label for="ingredient_unit">Unit:</label>
          <select class="form-control" id="ingredient_unit" name="ingredient_unit">
            <option value="1">tsp</option>
            <option value="2">tbsp</option>
            <option value="3">oz</option>
            <option value="4">cup</option>
            <option value="5">pound</option>
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
  </form>
@stop
