<?php

namespace Recipe;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model {
  public function ingredients() {
      // Recipe has many Ingredients
      return $this->belongsToMany('\Recipe\Ingredient');
  }

  public function users() {
      return $this->belongsToMany('\Recipe\User')->withTimestamps();
  }
}
