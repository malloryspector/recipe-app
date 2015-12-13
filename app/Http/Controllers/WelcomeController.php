<?php

namespace Recipe\Http\Controllers;

use Recipe\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

  /**
  * Responds to requests to GET /
  */
  public function getIndex() {
    if(\Auth::check()) {
      return redirect()->to('/recipe/show');
    }
    return view('index');
  }

}
