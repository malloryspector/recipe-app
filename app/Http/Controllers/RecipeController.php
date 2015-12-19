<?php

namespace Recipe\Http\Controllers;

use Recipe\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeController extends Controller {

  /**
  * Responds to requests to GET /recipe/show
  */
  public function getIndex() {
    $user_recipes = \Recipe\User::where('id','=',\Auth::id())->with('recipes')->get();

    // array to hold all recipes for the user
    $recipes = [];
    foreach($user_recipes as $user) {
      $recipes = $user->recipes;
    }

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
    // validate data
    $this->validate($request, [
      'recipe_name' => 'required',
      'directions' => 'required',
      'prep_time' => 'required|numeric|max:100',
      'cook_time' => 'required|numeric|max:100',
    ]);

    $recipe = new \Recipe\Recipe();

    $recipe->recipe_name = $request->recipe_name;
    $recipe->directions = $request->directions;
    $recipe->prep_time = $request->prep_time;
    $recipe->cook_time = $request->cook_time;

    $recipe->save();

    $recipe->users()->sync([\Auth::id()]);

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

    \Session::flash('flash_message','Your recipe has been created.');
    return redirect('/recipe/show');
  }

  /**
  * Responds to requests to GET /recipe/edit/{id}
  */
  public function getEdit($id = null) {
    $recipe = \Recipe\Recipe::find($id);

    $ingredients = \Recipe\Ingredient::where('recipe_id', '=', $id)->get();

    return view('recipes.edit')
      ->with('recipe', $recipe)
      ->with('ingredients', $ingredients);
  }

  /**
  * Responds to requests to POST /recipe/edit
  */
  public function postEdit(Request $request) {
    // validate data
    $this->validate($request, [
      'recipe_name' => 'required',
      'directions' => 'required',
      'prep_time' => 'required|numeric|max:100',
      'cook_time' => 'required|numeric|max:100',
    ]);

    $recipe = \Recipe\Recipe::find($request->id);

    $recipe->recipe_name = $request->recipe_name;
    $recipe->directions = $request->directions;
    $recipe->prep_time = $request->prep_time;
    $recipe->cook_time = $request->cook_time;

    $recipe->save();

    // get ingredients and delete to replace with new ingredients (in case quantity increases or decreases)
    $ingredients = \Recipe\Ingredient::where('recipe_id', '=', $request->id)->get();

    foreach($ingredients as $ingredient) {
      $ingredient->delete();
    }

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

    \Session::flash('flash_message','Your recipe has been edited.');
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

    // delete for the user only as some recipes can be shared by multiple users
    $recipe->users()->detach([\Auth::id()]);

    \Session::flash('flash_message','Your recipe has been deleted.');
    return redirect('/recipe/show');
  }

}
