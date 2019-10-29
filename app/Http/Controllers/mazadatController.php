<?php

namespace App\Http\Controllers;


use App\cars;
use App\HighValue;
use App\jewelry;
use App\property;
use App\vichle;

class mazadatController extends Controller
{
    public function ListMazadat(){
        $cars = cars::paginate(4);
        $cars_count = cars::count();
        $jewelrys = jewelry::paginate(4);
        $properties = property::paginate(4);
        $highvalues = HighValue::paginate(4);
        $vichels = vichle::paginate(4);
        $Autioncars = cars::where('Auction_type','=','مزاد فورى')->paginate(4);
        $Autionjewelrys = jewelry::where('Auction_type','=','مزاد فورى')->paginate(4);
        $Autionproperties = property::where('Auction_type','=','مزاد فورى')->paginate(4);
        $Autionhighvalues = HighValue::where('Auction_type','=','مزاد فورى')->paginate(4);
        $Autionvichels = vichle::where('Auction_type','=','مزاد فورى')->paginate(4);

        return view('MenubarViews.mazadat',compact('cars','jewelrys','properties','highvalues','vichels'
        ,'Autioncars','Autionjewelrys','Autionproperties','Autionhighvalues','Autionvichels'
        ));
    }

}