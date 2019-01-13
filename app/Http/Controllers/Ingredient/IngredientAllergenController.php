<?php

namespace App\Http\Controllers\Ingredient;

use App\Allergen;
use App\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class IngredientAllergenController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function index(Ingredient $ingredient)
    {
        $allergens = $ingredient->allergens;
        return $this->showAll( $allergens );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient, Allergen $allergen)
    {
        $ingredient->allergens()->syncWithoutDetaching($allergen->id);
        $allergens = $ingredient->allergens;
        return $this->showAll($allergens);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient, Allergen $allergen)
    {
        if(!$ingredient->allergens()->find( $allergen->id )) {
            return $this->errorsResponse('Allergen not found on Ingredient', 404);
        }

        $ingredient->allergens()->detach([$allergen->id]);

        return $this->showAll($ingredient->allergens);
    }
}
