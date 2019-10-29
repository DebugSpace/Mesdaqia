<?php

namespace App\Http\Controllers;

use App\property;
use Illuminate\Http\Request;

class propertiesController extends Controller
{
    public function ListProperty(){
        $properties= property::paginate(4);
        return view('Basic_pages.properties',compact('properties'));
    }
}
