<?php

namespace App\Http\Controllers\Allergen;

use App\Allergen;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class AllergenController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allegens = Allergen::all();
        return $this->showAll( $allegens , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];

        $this->validate( $request, $rules );

        $allergen = Allergen::create( $request->all() );

        return $this->showOne( $allergen );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function show(Allergen $allergen)
    {
        return $this->showOne($allergen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Allergen  $allergen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allergen $allergen)
    {
        $allergen->fill($request->only([
            'name',
            'description',
        ]));

        if($allergen->isClean())
        {
            return $this->errorsResponse('modify one field at least', 422);
        }
        $allergen->save();

        return $this->showOne($allergen);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Allergen $allergen
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Allergen $allergen)
    {
        $allergen->delete();
        return $this->showOne($allergen);
    }
}
