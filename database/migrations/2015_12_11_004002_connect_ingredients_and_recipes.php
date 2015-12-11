<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectIngredientsAndRecipes extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema::table('ingredients', function (Blueprint $table) {
        // Add a new INT field called `recipe_id` that has to be unsigned (i.e. positive)
        $table->integer('recipe_id')->unsigned();

        //This field `recipe_id` is a foreign key that connects to the `id` field in the `recipes` table
        $table->foreign('recipe_id')->references('id')->on('recipes');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::table('ingredients', function (Blueprint $table) {

        // ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
        // combine tablename + fk field name + the word "foreign"
        $table->dropForeign('ingredients_recipe_id_foreign');

        $table->dropColumn('recipe_id');
      });
    }
}
