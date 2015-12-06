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

    return view('recipes.show')->with('recipe', $recipe);
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

    return redirect('/recipe/show');
  }

  /**
  * Responds to requests to GET /recipe/edit/{id}
  */
  public function getEdit($id = null) {
    $recipe = \Recipe\Recipe::find($id);

    return view('recipes.edit')->with('recipe', $recipe);
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

    return redirect('/recipe/show/' . $request->id);
  }

  /**
  * Responds to requests to GET /recipe/delete/{id}
  */
  public function getDelete($id) {
    $recipe = \Recipe\Recipe::find($id);

    $recipe->delete();

    return redirect('/recipe/show');
  }

}
