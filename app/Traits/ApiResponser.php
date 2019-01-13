<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }
    protected function errorsResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }
    protected function showAll(Collection $collection, $code = 200)
    {
        if (!$collection->isEmpty()) {
            return $this->successResponse(['data' => $collection], $code);
        }
    }

    protected function showOne(Model $instance, $code = 200)
    {
//        $transformer = $instance->transformer;
//        $instance = $this->transformData($instance, $transformer);
        return $this->successResponse($instance, $code);
    }

}