<?php

use Illuminate\Database\Seeder;

class RecipeUserTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

      $recipes =[
          'Ants on a Log' => ['Jill'],
          'Stir Fried Kale' => ['Jill','Jamal'],
          'Black Bean and Salsa Soup' => ['Jamal']
      ];

      foreach($recipes as $recipe => $user) {
        $recipe = \Recipe\Recipe::where('recipe_name','like', $recipe)->first();

        foreach($user as $userName) {
          $user = \Recipe\User::where('name','LIKE', $userName)->first();
          $recipe->users()->save($user);
        }
      }
    }
}
