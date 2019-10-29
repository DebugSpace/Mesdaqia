<?php

namespace App\Http\Controllers;

use App\jewelry;
use Illuminate\Http\Request;

class jewelryController extends Controller
{
    public function ListJewelry(){
        $jewelrys = jewelry::paginate(4);
        return view('Basic_pages.jewelrys',compact('jewelrys'));
    }
}
