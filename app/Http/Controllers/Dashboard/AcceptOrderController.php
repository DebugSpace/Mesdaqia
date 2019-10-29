<?php

namespace App\Http\Controllers\Dashboard;

use App\Auth_car;
use App\Auth_highValue;
use App\Auth_jewelry;
use App\Auth_property;
use App\Auth_vichle;
use App\cars;
use App\HighValue;
use App\jewelry;
use App\notifications;
use App\property;
use App\vichle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcceptOrderController extends Controller
{
    protected function Accept_car_order($id,$type,$vendor,$color,$year,$new,$price,$model,$ownerID,$Auction_type,$location,$Guarant,$viewers,$image,$status,$producttime)
    {
        $cars = cars::create([
            'type'=>$type,'vendor'=>$vendor,
            'color'=>$color,'year'=>$year,'new'=>$new,
            'price'=>$price,'model'=>$model,'ownerID'=>$ownerID,'Auction_type'=>$Auction_type,
            'location'=>$location,'Guarant'=>$Guarant,'viewers'=>$viewers,
            'image'=>$image,'status'=>$status,'producttime'=>$producttime
        ]);
        session()->flash('success',__('site.inserted_successfully_in_car'));
        $au_de = Auth_car::find($id);
        $au_de->delete();
        return back();
    }
    protected function Accept_jewelry_order($id,$type,$material,$weight,$price,$ownerID,$new,$Auction_type,$Guarant,$viewers,$image,$status,$producttime)
    {
        $jewelries = jewelry::create([
            'type'=>$type,'material'=>$material,
            'weight'=>$weight,'price'=>$price,
            'ownerID'=>$ownerID,'new'=>$new,'Auction_type'=>$Auction_type,
            'Guarant'=>$Guarant,'viewers'=>$viewers,
            'image'=>$image,'status'=>$status,'producttime'=>$producttime
        ]);
        session()->flash('success',__('site.inserted_successfully_in_jew'));
        $au_de = Auth_jewelry::find($id);
        $au_de->delete();
        return back();
    }
    protected function Accept_highvalue_order($id,$type,$price,$new,$ownerID,$Auction_type,$Guarant,$viewers,$image,$status,$producttime)
    {
        $highValue = HighValue::create([
            'type'=>$type,
            'price'=>$price,'new'=>$new,
            'ownerID'=>$ownerID,'Auction_type'=>$Auction_type,
            'Guarant'=>$Guarant,'viewers'=>$viewers,
            'image'=>$image,'status'=>$status,'producttime'=>$producttime
        ]);
        session()->flash('success',__('site.inserted_successfully_in_highva'));
        $au_de = Auth_highValue::find($id);
        $au_de->delete();
        return back();
    }

    protected function Accept_vichle_order($id,$type,$year,$model,$vendor,$color,$new,$status,$ownerID,$price,$Auction_type,$location,$Guarant,$viewers,$image,$producttime)
    {
        $vichle = vichle::create([
            'type'=>$type,'year'=>$year,'model'=>$model,'vendor'=>$vendor,'color'=>$color
            ,'new'=>$new, 'status'=>$status,'ownerID'=>$ownerID,'price'=>$price,
            'Auction_type'=>$Auction_type, 'location'=>$location,'Guarant'=>$Guarant,
            'viewers'=>$viewers,'image'=>$image,'producttime'=>$producttime
        ]);
        session()->flash('success',__('site.inserted_successfully_in_vich'));
        $au_de = Auth_vichle::find($id);
        $au_de->delete();
        return back();
    }
    protected function Accept_proparity_order($id,$type,$street,$city,$new,$status,$ownerID,$floors,$price,$rooms,$SizeInMeter,$Auction_type,$location,$Guarant,$viewers,$image,$producttime)
    {
        $proparity= property::create([
            'type'=>$type,'street'=>$street,'city'=>$city,'new'=>$new,
            'status'=>$status,'ownerID'=>$ownerID,'floors'=>$floors,'price'=>$price,
            'rooms'=>$rooms,'SizeInMeter'=>$SizeInMeter,'Auction_type'=>$Auction_type,
            'location'=>$location,'Guarant'=>$Guarant,'viewers'=>$viewers,
            'image'=>$image,'producttime'=>$producttime
        ]);
        session()->flash('success',__('site.inserted_successfully_in_prop'));
        $au_de = Auth_property::find($id);
        $au_de->delete();
        return back();
    }

    protected function Reject_order($ownerID)
    {
        $notification = notifications::create(
            [
                'ownerID' =>$ownerID,
                'Message' =>'من فضلك ادخل مزاد صحيح'
            ]
        );
        session()->flash('success',__('site.send_notification_to_user_refuse_order'));
        return back();
    }
}
