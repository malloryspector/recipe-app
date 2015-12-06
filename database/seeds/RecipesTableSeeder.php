<?php

use Illuminate\Database\Seeder;

class RecipesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      DB::table('recipes')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'recipe_name' => 'Ants on a Log',
        'directions' => 'Cut the celery stalks in half. Spread with peanut butter. Sprinkle with raisins.',
        'prep_time' => 5,
        'cook_time' => 5,
      ]);
      DB::table('recipes')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'recipe_name' => 'Stir Fried Kale',
        'directions' => '1. Heat oil over medium-high heat in a large frying pan. Add onions and garlic; cook and stir until soft. 2. Mix in breadcrumbs, and cook and stir until brown. 3. Stir in kale, and cook until wilted. Server hot or warm.',
        'prep_time' => 6,
        'cook_time' => 20,
      ]);
      DB::table('recipes')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'recipe_name' => 'Black Bean and Salsa Soup',
        'directions' => '1. In an electric food processor or blender, combine beans, broth, salsa, and cumin. Blend until fairly smooth. 2. Heat the bean mixture in a saucepan over medium heat until thoroughly heated. 3. Ladle soup into 4 individual bowls, and top each bown with 1 tablespoon of the sour cream and 1/2 tablespoon green onion.',
        'prep_time' => 10,
        'cook_time' => 10,
      ]);
    }
}
