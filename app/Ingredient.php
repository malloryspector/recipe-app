<?php

namespace Recipe;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model {
  public function recipe() {
      // Ingredient belongs to recipe
      return $this->belongsTo('\Recipe\Recipe');
  }
}
