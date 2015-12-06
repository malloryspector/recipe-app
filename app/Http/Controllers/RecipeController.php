<?php

namespace Recipe\Http\Controllers;

use Recipe\Http\Controllers\Controller;

class RecipeController extends Controller {

  /**
  * Responds to requests to GET /recipe/show
  */
  public function getIndex() {
    return view('recipes.show');
  }

  /**
  * Responds to requests to GET /recipe/show/{recipe_id}
  */
  public function getShow() {
    echo 'Show one recipe';
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
  public function postCreate() {
    echo 'Submit a new recipe';
  }

  /**
  * Responds to requests to GET /recipe/edit/{recipe_id}
  */
  public function getEdit() {
    return view('recipes.edit');
  }

  /**
  * Responds to requests to POST /recipe/edit/{recipe_id}
  */
  public function postEdit() {
    echo 'Submit an edited recipe';
  }

}
