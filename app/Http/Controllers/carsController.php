<?php

namespace App\Http\Controllers;

use App\cars;
use Illuminate\Http\Request;

class carsController extends Controller
{
    public function ListCars(){

        $cars = cars::paginate(4);
        $mixcars = cars::max('price');
        return view('Basic_pages.cars',compact('cars','mixcars'));
    }
}
