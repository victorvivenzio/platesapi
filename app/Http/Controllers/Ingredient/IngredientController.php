<?php

namespace App\Http\Controllers\Ingredient;

use App\Ingredient;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class IngredientController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredient = Ingredient::all();
        return $this->showAll( $ingredient , 200);
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

        $ingredient = Ingredient::create( $request->all() );

        return $this->showOne( $ingredient );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        return $this->showOne($ingredient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->fill($request->only([
            'name',
            'description',
        ]));

        if($ingredient->isClean())
        {
            return $this->errorsResponse('modify one field at least', 422);
        }
        $ingredient->save();

        return $this->showOne($ingredient);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ingredient $ingredient
     * @return Ingredient
     * @throws \Exception
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return $ingredient;
    }
}
