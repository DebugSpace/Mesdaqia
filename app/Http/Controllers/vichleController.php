<?php

namespace App\Http\Controllers;

use App\property;
use App\vichle;
use Illuminate\Http\Request;

class vichleController extends Controller
{
    public function ListVichle(){
        $vichles= vichle::paginate(4);
        return view('Basic_pages.vichles',compact('vichles'));
    }
}
