<?php

namespace Recipe\Http\Controllers;

use Recipe\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeController extends Controller {

  /**
  * Responds to requests to GET /recipe/show
  */
  public function getIndex() {
    $recipes = \Recipe\Recipe::orderBy('id', 'DESC')->get();

    return view('recipes.index')->with('recipes', $recipes);
  }

  /**
  * Responds to requests to GET /recipe/show/{id}
  */
  public function getShow($id = null) {
    $recipe = \Recipe\Recipe::find($id);

    $ingredients = \Recipe\Ingredient::where('recipe_id', '=', $id)->get();

    return view('recipes.show')
      ->with('recipe', $recipe)
      ->with('ingredients', $ingredients);
  }

  /**
  * Responds to requests to GET /recipe/create
  */
  public function getCreate() {
    return view('recipes.create');
  }

  /**
  * Responds to requests to POST /recipe/create
  */
  public function postCreate(Request $request) {
    $recipe = new \Recipe\Recipe();

    $recipe->recipe_name = $request->recipe_name;
    $recipe->directions = $request->directions;
    $recipe->prep_time = $request->prep_time;
    $recipe->cook_time = $request->cook_time;

    $recipe->save();

    // Get all ingredient values and place into an array
    $names = $request->ingredient_name;
    $whole_quantities = $request->quantity_whole;
    $part_quantities = $request->quantity_part;
    $unit = $request->unit;

    $ingredients = [$names, $whole_quantities, $part_quantities, $unit];

    // count how many ingredients were entered
    $ingredient_count = count($names);

    // loop through $ingredients array and save each ingredient
    for ($i = 0; $i < $ingredient_count; $i++) {
      $ingredient = new \Recipe\Ingredient();

      $ingredient->ingredient_name = $ingredients[0][$i];
      $ingredient->quantity_whole = $ingredients[1][$i];
      $ingredient->quantity_part = $ingredients[2][$i];
      $ingredient->unit = $ingredients[3][$i];
      $ingredient->recipe_id = $recipe->id;

      $ingredient->save();
    }

    return redirect('/recipe/show');
  }

  /**
  * Responds to requests to GET /recipe/edit/{id}
  */
  public function getEdit($id = null) {
    $recipe = \Recipe\Recipe::find($id);

    $ingredients = \Recipe\Ingredient::where('recipe_id', '=', $id)->first();

    return view('recipes.edit')
      ->with('recipe', $recipe)
      ->with('ingredients', $ingredients);
  }

  /**
  * Responds to requests to POST /recipe/edit
  */
  public function postEdit(Request $request) {
    $recipe = \Recipe\Recipe::find($request->id);

    $recipe->recipe_name = $request->recipe_name;
    $recipe->directions = $request->directions;
    $recipe->prep_time = $request->prep_time;
    $recipe->cook_time = $request->cook_time;

    $recipe->save();

    $ingredients = \Recipe\Ingredient::where('recipe_id', '=', $request->id)->first();

    $ingredients->ingredient_name = $request->ingredient_name;
    $ingredients->quantity_whole = $request->quantity_whole;
    $ingredients->quantity_part = $request->quantity_part;
    $ingredients->unit = $request->unit;

    $ingredients->save();

    return redirect('/recipe/show/' . $request->id);
  }

  /**
  * Responds to requests to GET /recipe/delete/{id}
  */
  public function getDelete($id) {

    $ingredients = \Recipe\Ingredient::where('recipe_id', '=', $id)->get();

    foreach($ingredients as $ingredient) {
      $ingredient->delete();
    }

    $recipe = \Recipe\Recipe::find($id);
    $recipe->delete();

    return redirect('/recipe/show');
  }

}
