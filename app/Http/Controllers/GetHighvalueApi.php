<?php

namespace App\Http\Controllers;
use App\HighValue;
class GetHighvalueApi extends Controller
{
    //
    public function listhighvalue()
    {
        $highvalue = HighValue::all();
        $highvalueCount = $highvalue->count();
        return response()->json(['count of rows'=>$highvalueCount,'data'=>$highvalue],200);
    }
}
