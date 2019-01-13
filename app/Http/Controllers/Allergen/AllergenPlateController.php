<?php

namespace App\Http\Controllers\Allergen;

use App\Allergen;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class AllergenPlateController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Allergen $allergen
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Allergen $allergen)
    {
        return $this->showAll($allergen->plates());
    }

}
