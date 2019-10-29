<?php

namespace App\Http\Controllers;
use App\AddtoCard;
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
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\HttpFoundation\Session\Session;
class productController extends Controller
{
    //select and display forms
    public function SelectProduct(){
        $notification = notifications::all();
        $getowneridadd_card = AddtoCard::all();
        return view('pages_profile_list.enter',compact('notification','getowneridadd_card'));
    }
    public function AddProduct(){

        return view('Basic_pages.add_product');
    }
    public function FormCar(){
        return view('Basic_pages.formcars');
    }
    public function FormJewelry(){

        return view('Basic_pages.formjewelries');
    }
    public function FormProperty(){

        return view('Basic_pages.formproperties');
    }
    public function FormVichle(){

        return view('Basic_pages.formvichles');
    }
    public function Formhighvalue(){

        return view('Basic_pages.formhighvalues');
    }
    /////////////////////////////////////////////////////////
    public function addcar(Request $request){
        if ($request->isMethod('post')){
            if ($request->hasFile('image')) {
                    $cars = new Auth_car($request->all());
                    $imageName = $request->file('image')->getClientOriginalName();
                    $request->file('image')->move(public_path('productimages'), $imageName);
                    $image = $cars->image = $imageName;
                    // get from text field from enter blade must put it first

                    $created_at = $cars->created_at;
                    $carbon_date = Carbon::parse($created_at);
                    $user_hour = (int)$request->input('product_time');
                    $cars->producttime = $carbon_date->addHours($user_hour);
                    //////////////////////////////////
                    $cars->save();
                    return redirect('/cars')->with('message', 'data inserted correcr');
                }
        }
        return view('Basic_pages.formcars');
    }
    public function addjewelry(Request $request){
        if ($request->isMethod('post')){
            if ($request->hasFile('image')) {
                $jewelries = new Auth_jewelry($request->all());
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('productimages'), $imageName);
                $image = $jewelries->image = $imageName;
                // get from text field from enter blade must put it first
                $created_at = $jewelries->created_at;
                $carbon_date = Carbon::parse($created_at);
                $user_hour = (int)$request->input('product_time');
                $jewelries->producttime = $carbon_date->addHours($user_hour);
                //////////////////////////////////
                $jewelries->save();
                return redirect('/jewelry')->with('message', 'data inserted correcr');
            }
        }
        return view('Basic_pages.formjewelries');
    }
    public function addproperty(Request $request){
        if ($request->isMethod('post')){
            if ($request->hasFile('image')) {
                $property = new Auth_property($request->all());
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('productimages'), $imageName);
                $image = $property->image = $imageName;
                // get from text field from enter blade must put it first
                $created_at = $property->created_at;
                $carbon_date = Carbon::parse($created_at);
                $user_hour = (int)$request->input('product_time');
                $property->producttime = $carbon_date->addHours($user_hour);
                //////////////////////////////////
                $property->save();
                return redirect('/property')->with('message', 'data inserted correcrt');
            }
        }
        return view('Basic_pages.formproperties');
    }
    public function addhighvalue(Request $request){
        if ($request->isMethod('post')){
            if ($request->hasFile('image')) {
                $highvalue = new Auth_highValue($request->all());
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('productimages'), $imageName);
                $image = $highvalue->image = $imageName;
                 // get from text field from enter blade must put it first
                 $created_at = $highvalue->created_at;
                 $carbon_date = Carbon::parse($created_at);
                 $user_hour = (int)$request->input('product_time');
                 $highvalue->producttime = $carbon_date->addHours($user_hour);
                 //////////////////////////////////
                $highvalue->save();
                return redirect('/highvalue')->with('message', 'data inserted correcrt');
            }
        }
        return view('Basic_pages.formhighvalues');
    }
    public function addvichles(Request $request){
        if ($request->isMethod('post')) {
            if ($request->hasFile('image')) {
                $vichle = new Auth_vichle($request->all());
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('productimages'), $imageName);
                $image = $vichle->image = $imageName;
                // get from text field from enter blade must put it first
                $created_at = $vichle->created_at;
                $carbon_date = Carbon::parse($created_at);
                $user_hour = (int)$request->input('product_time');
                $vichle->producttime = $carbon_date->addHours($user_hour);
                //////////////////////////////////
                $vichle->save();
                return redirect('/vichle')->with('message', 'data inserted correcrt');
            }
        }
        return view('Basic_pages.formvichles');
    }
}

