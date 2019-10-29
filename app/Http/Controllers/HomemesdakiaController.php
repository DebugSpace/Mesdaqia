<?php

namespace App\Http\Controllers;

use App\Add_im_text;
use App\advertis;
use App\HighValue;
use App\jewelry;
use App\property;
use App\Vichle;
use App\User;
use Illuminate\Http\Request;

class HomemesdakiaController extends Controller
{
    protected function homeMed(){
        
       // return "hello";

        $Maxvichle =Vichle::all();
          // dd($Maxvichle);
        $vichles = vichle::where('viewers',$Maxvichle)->first();

        ///////////////////////////////
        $Maxproperty = property::max('viewers');
        $propertys = property::where('viewers',$Maxproperty)->first();
        ///////////////////////////////
        $Maxjewelry = jewelry::max('viewers');
        $jewelrys = jewelry::where('viewers',$Maxjewelry)->first();
        //////////////////////////////
        $Maxhighvalue = HighValue::max('viewers');
        $highvalues = HighValue::where('viewers',$Maxhighvalue)->first();
        //////////////////////////////
        $con=Add_im_text::all()->last();
        /// ////////////////
        $adv=advertis::all()->last();
        /////////////////////////////////
        return view('MenubarViews.homemesdakia',compact('highvalues','jewelrys','propertys','vichles','con','adv'));
    }
}
