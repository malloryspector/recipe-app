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
        'quantity_part' => .25,
        'unit' => 'tbsp',
      ]);
      DB::table('ingredients')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'ingredient_name' => 'Raisins',
        'quantity_whole' => 0,
        'quantity_part' => .25,
        'unit' => 'cups',
      ]);
      DB::table('ingredients')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'ingredient_name' => 'Celery',
        'quantity_whole' => 5,
        'quantity_part' => 0,
        'unit' => 'stalks',
      ]);
    }
}
