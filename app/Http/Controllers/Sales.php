<?php

namespace App\Http\Controllers;

use App\cars;
use App\HighValue;
use App\jewelry;
use App\property;
use App\User;
use App\vichle;
use Illuminate\Http\Request;

class Sales extends Controller
{
    protected function fawrysales(){
        // get all count of tables and addition its then send to view
        $cars = cars::count();
        $highvalue = HighValue::count();
        $jewelry = jewelry::count();
        $property = property::count();
        $vichle = vichle::count();
        $mazaids = $cars+$jewelry+$property+$vichle+$highvalue;
        $Autioncars = cars::where('Auction_type','=','مزاد فورى')->paginate(4);
        $Autionjewelrys = jewelry::where('Auction_type','=','مزاد فورى')->paginate(4);
        $Autionproperties = property::where('Auction_type','=','مزاد فورى')->paginate(4);
        $Autionhighvalues = HighValue::where('Auction_type','=','مزاد فورى')->paginate(4);
        $Autionvichels = vichle::where('Auction_type','=','مزاد فورى')->paginate(4);
        //get
        $users = User::count();
        return view('MenubarViews.sales',compact('mazaids','users','Autioncars','Autionjewelrys'
        ,'Autionproperties','Autionhighvalues','Autionvichels'
        ));
    }
}
