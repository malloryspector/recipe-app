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
    }
}
