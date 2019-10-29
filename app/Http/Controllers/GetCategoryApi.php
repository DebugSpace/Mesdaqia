<?php

namespace App\Http\Controllers;

use App\cars;
use App\category;
use Illuminate\Http\Request;


class GetCategoryApi extends Controller
{
    //
    public function listCars()
    {
        $category = category::all();
        $categoryCount = $category->count();
        return response()->json(['count of rows'=>$categoryCount,'data'=>$category],200);
    }
}
