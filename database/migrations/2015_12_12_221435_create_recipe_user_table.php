<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeUserTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema::create('recipe_user', function (Blueprint $table) {

        $table->increments('id');
        $table->timestamps();

        $table->integer('recipe_id')->unsigned();
        $table->integer('user_id')->unsigned();

        # Make foreign keys
        $table->foreign('recipe_id')->references('id')->on('recipes');
        $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::drop('recipe_user');
    }
}
