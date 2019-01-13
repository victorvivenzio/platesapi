<?php

namespace App\Http\Controllers\Plate;

use App\Ingredient;
use App\Plate;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PlateIngredientController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plate $plate)
    {
        return $this->showAll($plate->ingredients);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate, Ingredient $ingredient)
    {
        $plate->ingredients()->syncWithoutDetaching($ingredient->id);
        $ingredients = $plate->ingredients;
        return $this->showAll($ingredients);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate, Ingredient $ingredient)
    {
        if(!$plate->ingredients()->find( $ingredient->id )) {
            return $this->errorsResponse('Ingredient not found on Plate', 404);
        }

        $plate->ingredients()->detach([$ingredient->id]);

        return $this->showAll($plate->ingredients);
    }
}
