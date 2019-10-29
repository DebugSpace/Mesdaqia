<?php

namespace App\Http\Controllers;

use App\vichle;
use Illuminate\Http\Request;

class GetvichlesApi extends Controller
{
    //
    public function listvichle()
    {

        $vichles = vichle::all();
        $vichlesCount = $vichles->count();
        return response()->json(['count of rows'=>$vichlesCount,'data'=>$vichles],200);


    }
}
