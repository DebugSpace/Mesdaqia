<?php

namespace App\Http\Controllers;

use App\jewelry;
use Illuminate\Http\Request;


class GetjewelryApi extends Controller
{
    //
    public function listjewelery()
    {
       
        $jewelry = jewelry::all();
        $jewelryCount = $jewelry->count();
        return response()->json(['count of rows'=>$jewelryCount,'data'=>$jewelry],200);


    }
}
