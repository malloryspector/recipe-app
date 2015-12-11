<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
      Schema::create('ingredients', function(Blueprint $table) {
        $table->increments('id');
        $table->timestamps();
        $table->string('ingredient_name');
        $table->integer('quantity_whole')->unsigned();
        $table->string('quantity_part');
        $table->string('unit');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::drop('ingredients');
    }
}
