<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      DB::table('ingredients')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'ingredient_name' => 'Peanut Butter',
        'quantity_whole' => 1,
        'quantity_part' => '1/4',
        'unit' => 'tbsp',
        'recipe_id' => 1,
      ]);
      DB::table('ingredients')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'ingredient_name' => 'Raisins',
        'quantity_whole' => 0,
        'quantity_part' => '0',
        'unit' => 'cups',
        'recipe_id' => 1,
      ]);
      DB::table('ingredients')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'ingredient_name' => 'Celery',
        'quantity_whole' => 5,
        'quantity_part' => '7/8',
        'unit' => 'stalks',
        'recipe_id' => 1,
      ]);
      DB::table('ingredients')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'ingredient_name' => 'Kale',
        'quantity_whole' => 3,
        'quantity_part' => '7/8',
        'unit' => 'bunch',
        'recipe_id' => 2,
      ]);
      DB::table('ingredients')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'ingredient_name' => 'Garlic',
        'quantity_whole' => 1,
        'quantity_part' => '0',
        'unit' => 'clove',
        'recipe_id' => 2,
      ]);
      DB::table('ingredients')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'ingredient_name' => 'Black Beans',
        'quantity_whole' => 1,
        'quantity_part' => '1/2',
        'unit' => 'pounds',
        'recipe_id' => 3,
      ]);
      DB::table('ingredients')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'ingredient_name' => 'Salsa',
        'quantity_whole' => 1,
        'quantity_part' => '0',
        'unit' => 'can',
        'recipe_id' => 3,
      ]);
    }
}
