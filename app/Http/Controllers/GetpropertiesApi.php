<?php

namespace App\Http\Controllers;

use App\property;
use Illuminate\Http\Request;


class GetpropertiesApi extends Controller
{
    //
    public function listproperty()
    {
        $property = property::all();
        $propertyCount = $property->count();
        return response()->json(['count of rows'=>$propertyCount,'data'=>$property],200);
                  
    
    }
}
