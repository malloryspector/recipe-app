<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema::create('recipes', function(Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->string('recipe_name');
        $table->text('directions');
        $table->integer('prep_time');
        $table->integer('cook_time');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::drop('recipes');
    }
}
