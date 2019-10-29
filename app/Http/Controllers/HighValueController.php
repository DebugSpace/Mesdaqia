<?php

namespace App\Http\Controllers;

use App\HighValue;
use Illuminate\Http\Request;

class HighValueController extends Controller
{
    public function ListHigh(){
        $hightvalues= HighValue::paginate(4);
        return view('Basic_pages.hightvalues',compact('hightvalues'));
    }
}
