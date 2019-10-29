<?php

namespace App\Http\Controllers;

use App\AddtoCard;
use Illuminate\Http\Request;

class AddToCardController extends Controller
{
    public function addcard($productid,$ownerID,$image,$type,$price){
        $addcard =new AddtoCard();
        $addcard->productid=$productid;
        $addcard->ownerID=$ownerID;
        $addcard->image=$image;
        $addcard->type=$type;
        $addcard->price=$price;
        $addcard->save();
        return back();
    }
    public function deletecard($id){
        $deleteproduct = AddtoCard::where('id','=',$id);
        $deleteproduct->delete();
        return back();
    }
}
