<?php

namespace App\Http\Controllers\Plate;

use App\Plate;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class PlateAllergenController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plate $plate)
    {
        $allergens = $plate->allergens();
        return $this->showAll($allergens);
    }


}
