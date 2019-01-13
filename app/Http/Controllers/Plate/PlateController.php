<?php

namespace App\Http\Controllers\Plate;

use App\Http\Controllers\ApiController;
use App\Plate;
use Illuminate\Http\Request;

class PlateController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::with('category')->get();

        return $this->showAll($plates);
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
            'price' => 'required|numeric',
            'status' => 'required|in:' . Plate::PLATE_AVALAIBLE . ',' . Plate::PLATE_NOT_AVALAIBLE,
            'category_id' => 'required|exists:categories,id',
        ];

        $this->validate($request, $rules);
        $fields = $request->all();

        $plate = Plate::create($fields);

        return $this->showOne( $plate , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        return $this->showOne($plate->with('category')->first());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Plate $plate
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Plate $plate)
    {
        $rules = [
            'price' => 'numeric',
            'status' => 'in:' . Plate::PLATE_AVALAIBLE . ',' . Plate::PLATE_NOT_AVALAIBLE,
            'category_id' => 'exists:categories,id',
        ];

        $this->validate($request, $rules);
        if ($request->has('name'))
        {
            $plate->name = $request->name;
        }

        if ($request->has('description'))
        {
            $plate->description = $request->description;
        }

        if ($request->has('price'))
        {
            $plate->price = $request->price;
        }

        if ($request->has('status'))
        {
            $plate->status = $request->status;
        }

        if ($request->has('category_id'))
        {
            $plate->category_id = $request->category_id;
        }

        if($plate->isClean())
        {
            return $this->errorsResponse('modify one field at least', 422);
        }
        $plate->save();
        return $this->showOne( $plate , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plate $plate
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Plate $plate)
    {
        $plate->delete();
        return $this->showOne($plate);
    }
}
