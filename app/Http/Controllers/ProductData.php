<?php
namespace App\Http\Controllers;
use App\cars;
use App\HighValue;
use App\jewelry;
use App\property;
use App\vichle;

class ProductData extends Controller
{
    protected function carsproduct($id){
        $cars = cars::find($id);
        $image = $cars->image;
        $type = $cars->type;
        $color = $cars->color;
        $model = $cars->model;
        $new = $cars->new;
        $Guarant = $cars->Guarant;
        $location = $cars->location;
        $price = $cars->price;
        $viewer = ++$cars->viewers;
        $cars->save();
        return redirect()->route('cardetail',compact('id','image','type','color','model','new','Guarant','location','price'));
        //return view('Basic_pages.carproductdetails',compact('image','type','color','model','new','Guarant','location','price'));
    }
    protected function vichleproduct($id){
        $vichle = vichle::find($id);
        $image=$vichle->image;
        $type=$vichle->type;
        $color=$vichle->color;
        $model=$vichle->model;
        $new = $vichle->new;
        $Guarant = $vichle->Guarant;
        $location = $vichle->location;
        $price = $vichle->price;
        $viewer = ++$vichle->viewers;
        $vichle->save();
        return redirect()->route('vichledetail',compact('id','image','type','color','model','new','Guarant','location','price'));
        //return view('Basic_pages.vichleproductdetails',compact('image','type','color','model','new','Guarant','location','price'));

    }
    protected function propertyproduct($id){
        $property = property::find($id);
        $image=$property->image;
        $SizeInMeter=$property->SizeInMeter;
        $type=$property->type;
        $floors=$property->floors;
        $rooms=$property->rooms;
        $new = $property->new;
        $Guarant = $property->Guarant;
        $location = $property->location;
        $price = $property->price;
        $viewer = ++$property->viewers;
        $property->save();
        return redirect()->route('propertydetail',compact('id','image','SizeInMeter','type','floors','rooms','new','Guarant','location','price'));
        //return view('Basic_pages.propertyproductdetails',compact('image','type','floors','rooms','new','Guarant','location','price'));


    }
    protected function highvalueproduct($id){
        $highvalue = HighValue::find($id);
        $image=$highvalue->image;
        $type=$highvalue->type;
        $name=$highvalue->name;
        $new = $highvalue->new;
        $status = $highvalue->status;
        $Guarant = $highvalue->Guarant;
        $price = $highvalue->price;
        $viewer = ++$highvalue->viewers;
        $highvalue->save();
        return redirect()->route('highvaluedetail',compact('id','image','type','floors','name','Guarant','price','new'));
        //return view('Basic_pages.highvalueproductdetails',compact('image','type','floors','name','Guarant','price'));
    }
    protected function jewelryproduct($id){
        $jewelry = jewelry::find($id);
        $image=$jewelry->image;
        $type=$jewelry->type;
        $material=$jewelry->material;
        $weight=$jewelry->weight;
        $new = $jewelry->new;
        $Guarant = $jewelry->Guarant;
        $location = $jewelry->location;
        $price = $jewelry->price;
        $viewer = ++$jewelry->viewers;
        $jewelry->save();
        return redirect()->route('jewlerydetail',compact('id','image','type','material','weight','new','Guarant','location','price'));
        //return view('Basic_pages.jewelryproductdetails',compact('image','type','material','weight','new','Guarant','location','price'));
    }

}