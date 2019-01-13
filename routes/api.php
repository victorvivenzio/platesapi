<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * categories
 */
Route::resource('categories', 'Category\CategoryController', ['except' => ['create', 'edit'] ]);
Route::resource('categories.plates', 'Category\CategoryPlateController', ['only' => ['index'] ]);

/**
 * Ingredients
 */
Route::resource('ingredients', 'Ingredient\IngredientController', ['except' => ['create', 'edit'] ]);
Route::resource('ingredients.allergens', 'Ingredient\IngredientAllergenController', ['only' => ['index','update','destroy'] ]);

/**
 * Allergens
 */
Route::resource('allergens', 'Allergen\AllergenController', ['except' => ['create', 'edit'] ]);
Route::resource('allergens.ingredients', 'Allergen\AllergenIngredientController', ['only' => ['index'] ]);
Route::resource('allergens.plates', 'Allergen\AllergenPlateController', ['only' => ['index'] ]);

/**
 * Plates
 */
Route::resource('plates', 'Plate\PlateController', ['except' => ['create', 'edit'] ]);
Route::resource('plates.ingredients', 'Plate\PlateIngredientController', ['only' => ['index','update','destroy'] ]);
Route::resource('plates.allergens', 'Plate\PlateAllergenController', ['only' => ['index'] ]);

/**
 * Users
 */
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit'] ]);