<?php

namespace App\Http\Controllers;

use App\cars;
use Illuminate\Http\Request;


class GetCarApi extends Controller
{
    //
    public function listCars()
    {
        $cars = cars::all();
        $carCount = $cars->count();
        return response()->json(['count of rows'=>$carCount,'data'=>$cars],200);
    }
}
