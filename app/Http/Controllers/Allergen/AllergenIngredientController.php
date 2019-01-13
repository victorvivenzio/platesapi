<?php

namespace App\Http\Controllers\Allergen;

use App\Allergen;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class AllergenIngredientController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Allergen $allergen
     * @return
     */
    public function index(Allergen $allergen)
    {
        $ingredients = $allergen->ingredients;
        return $this->showAll($ingredients);
    }

}
