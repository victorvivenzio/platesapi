<?php

use App\User;
use App\Category;
use App\Plate;
use App\Ingredient;
use App\Allergen;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Plate::truncate();
        Ingredient::truncate();
        Allergen::truncate();
        DB::table('allergen_ingredient')->truncate();
        DB::table('ingredient_plate')->truncate();

        User::flushEventListeners();
        Category::flushEventListeners();
        Plate::flushEventListeners();
        Ingredient::flushEventListeners();
        Allergen::flushEventListeners();

        $usersQuantity = 20;
        $categoriesQuantity = 5;
        $platesQuantity = 20;
        $ingredientsQuantity = 50;
        $allergensQuantity = 50;

        factory(User::class, $usersQuantity)->create();
        factory(Category::class, $categoriesQuantity)->create();
        factory(Allergen::class, $allergensQuantity)->create();
        factory(Ingredient::class, $ingredientsQuantity)->create()->each(
            function ($ingredient)
            {
                $allergens = Allergen::all()->random(mt_rand(1,3))->pluck('id');
                $ingredient->allergens()->attach($allergens);
            }
        );
        factory(Plate::class, $platesQuantity)->create()->each(
            function ($plate)
            {
                $ingredients = Ingredient::all()->random(mt_rand(1,3))->pluck('id');
                $plate->ingredients()->attach($ingredients);
            }
        );
    }
}
