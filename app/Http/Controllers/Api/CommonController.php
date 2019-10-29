<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\cars;
use App\category;
use App\HighValue;
use App\jewelry;
use App\property;
use App\User;
use App\vichle;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Property as PhpParserProperty;

class CommonController extends Controller
{
    public $successStatus = 200;
        public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
    
    public function UpdateAccount(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $newpassword = $request->input('newPassword');
        $confirmPassword = $request->input('confirmPassword');
        if($newpassword==$confirmPassword) {
            $user = User::find($id);
            $user->name = $name;
            $user->email = $email;
            $user->password = $newpassword;
            $user->save();
            return response()->json('success update');
        }
        return response()->json('not exist old data to update it');
    }
    public function addcar(Request $request){
        if ($request->isMethod('post')){
            if ($request->hasFile('image')) {
                $cars = new cars($request->all());
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('productimages'), $imageName);
                $image = $cars->image = $imageName;
                $cars->save();
                return response()->json(['status'=>"Success!!"]);
            }
            else{ return response()->json("Add photo please!!");}
        }
        else{return response()->json("use Post method please!!"); }
    }
    public function addjewelry(Request $request){
        if ($request->isMethod('post')){
            if ($request->hasFile('image')) {
                $jewelries = new jewelry($request->all());
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('productimages'), $imageName);
                $image = $jewelries->image = $imageName;
                $jewelries->save();
                return response()->json("Success!!");
            }
            else{ return response()->json("Add photo please!!");}
        }
        else{return response()->json("use Post method please!!"); }
    }
    public function addproperty(Request $request){
        if ($request->isMethod('post')){
            if ($request->hasFile('image')) {
                $property = new property($request->all());
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('productimages'), $imageName);
                $image = $property->image = $imageName;
                $property->save();
                return response()->json("Success!!");
            }
            else{ return response()->json("Add photo please!!");}
        }
        else{return response()->json("use Post method please!!"); }
    }
    public function addhighvalue(Request $request){
        if ($request->isMethod('post')){
            if ($request->hasFile('image')) {
                $highvalue = new HighValue($request->all());
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('productimages'), $imageName);
                $image = $highvalue->image = $imageName;
                $highvalue->save();
                return response()->json("Success!!");
            }
            else{ return response()->json("Add photo please!!");}
        }
        else{return response()->json("use Post method please!!"); }
    }
    public function addvichles(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->hasFile('image')) {
                $vichle = new vichle($request->all());
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('productimages'), $imageName);
                $image = $vichle->image = $imageName;
                $vichle->save();
                return response()->json("Success!!");
            }
            else{ return response()->json("Add photo please!!");}
        }
        else{return response()->json("use Post method please!!"); }
    }
    public function listCategory()
    {
        $category = category::all();
        $categoryCount = $category->count();
        return response()->json(['count of rows'=>$categoryCount,'data'=>$category],200);
    }
    public function listCars()
    {
        $cars = cars::all();
        $carCount = $cars->count();
        return response()->json(['count of rows'=>$carCount,'data'=>$cars],200);
    }
    public function listhighvalue()
    {
        $highvalue = HighValue::all();
        $highvalueCount = $highvalue->count();
        return response()->json(['count of rows'=>$highvalueCount,'data'=>$highvalue],200);
    }
    public function listjewelery()
    {
        $jewelry = jewelry::all();
        $jewelryCount = $jewelry->count();
        return response()->json(['count of rows'=>$jewelryCount,'data'=>$jewelry],200);
    }
    public function listproperty()
    {
        $property = property::all();
        $propertyCount = $property->count();
        return response()->json(['count of rows'=>$propertyCount,'data'=>$property],200);
    }
    public function listvichle()
    {
        $vichles = vichle::all();
        $vichlesCount = $vichles->count();
        return response()->json(['count of rows'=>$vichlesCount,'data'=>$vichles],200);
    }
    public function ListMazadat(){
        $cars = cars::all();
        $jewelrys = jewelry::all();
        $properties = property::all();
        $highvalues = HighValue::all();
        $vichels = vichle::all();
        $Autioncars = cars::where('Auction_type','=','مزاد فورى')->get();
        $Autionjewelrys = jewelry::where('Auction_type','=','مزاد فورى')->get();
        $Autionproperties = property::where('Auction_type','=','مزاد فورى')->get();
        $Autionhighvalues = HighValue::where('Auction_type','=','مزاد فورى')->get();
        $Autionvichels = vichle::where('Auction_type','=','مزاد فورى')->get();
        $Dataarray = [];
        foreach ($Autioncars as $car)
        {
            array_push($Dataarray,$car);
        }
        foreach ($Autionjewelrys as $jew)
        {
            array_push($Dataarray,$jew);
        }
        foreach ($Autionhighvalues as $hv)
        {
            array_push($Dataarray,$hv);
        }
        foreach ($Autionproperties as $prop)
        {
            array_push($Dataarray,$prop);
        }
        foreach ($Autionvichels as $vic)
        {
            array_push($Dataarray,$vic);
        }
        $vichlesCount = $vichels->count();
        $carsCount = $cars->count();
        $highvaluesCount = $highvalues->count();
        $jewelrysCount = $jewelrys->count();
        $propertiesCount = $properties->count();
        return response()->json($Dataarray);
    }
    public function CarSearch(Request $request)
    {
        $price = $request->input('price');
        $status = $request->input('status');
        $type = $request->input('type');
        $model = $request->input('model');
        $year = $request->input('year');
        if($price !=NULL && $status !=NULL && $type !=NULL && $model !=NULL && $year !=NULL)
        {
            $Dataarray1 = [];
//            {
                $search = [
                    ['price', '<=' ,$price],
                    ['new', '=' ,$status],
                    ['type', '=' ,$type],
                    ['model', '=' ,$model],
                    ['year', '>=' ,$year]
                ];
                $carssearch = cars::where($search)->get();
                
                foreach ($carssearch as $car )
                {
                    array_push($Dataarray1,$car);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function CarSearchByPrice(Request $request)
    {
        $price = $request->input('price');
 
        if($price !=NULL)
        {
            $Dataarray1 = [];
//            {
                $carssearch = cars::where('price', '<=' ,$price)->get();
                
                foreach ($carssearch as $car )
                {
                    array_push($Dataarray1,$car);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function CarSearchByModel(Request $request)
    {
        $model = $request->input('model');
 
        if($model !== NULL)
        {
            $Dataarray1 = [];
//            {
                $carssearch = cars::where('model', '=' ,$model)->get();
                
                foreach ($carssearch as $car )
                {
                    array_push($Dataarray1,$car);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function CarSearchByStatus(Request $request)
    {
        $status = $request->input('status');
 
        if($status !== NULL)
        {
            $Dataarray1 = [];
//            {
                $carssearch = cars::where('status', '=' ,$status)->get();
                
                foreach ($carssearch as $car )
                {
                    array_push($Dataarray1,$car);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function JewelrySearch(Request $request)
    {
        $material = $request->input('material');
        $gender = $request->input('gender');
        $type = $request->input('type');
        $model = $request->input('model');
        $weight = $request->input('weight');
        $price = $request->input('price');
        $new = $request->input('new');
        if($weight !=NULL && $price !=NULL && $type !=NULL && $model !=NULL && $material !=NULL && $new !=NULL && $gender !=NULL )
        {
            $Dataarray1 = [];
//            {
                $search = [
                    ['material', '=' ,$material],
                    ['gender', '=' ,$gender],
                    ['type', '=' ,$type],
                    ['model', '=' ,$model],
                    ['price', '<=' ,$price],
                    ['new', '=' ,$new],
                    ['weight', '>=' ,$weight]
                ];
                $Jewelrysearch = jewelry::where($search)->get();
                
                foreach ($Jewelrysearch as $Jew )
                {
                    array_push($Dataarray1,$Jew);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function JewelrySearchByPrice(Request $request)
    {
        $price = $request->input('price');
 
        if($price !=NULL)
        {
            $Dataarray1 = [];
//            {
                $Jewelrysearch = jewelry::where('price', '<=' ,$price)->get();
                
                foreach ($Jewelrysearch as $Jew )
                {
                    array_push($Dataarray1,$Jew);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function JewelrySearchByMatrial(Request $request)
    {
        $mat = $request->input('material');
 
        if($mat !=NULL)
        {
            $Dataarray1 = [];
//            {
                $Jewelrysearch = jewelry::where('material', '=' ,$mat)->get();
                
                foreach ($Jewelrysearch as $Jew )
                {
                    array_push($Dataarray1,$Jew);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function JewelrySearchByGender(Request $request)
    {
        $mat = $request->input('gender');
 
        if($mat !=NULL)
        {
            $Dataarray1 = [];
//            {
                $Jewelrysearch = jewelry::where('gender', '=' ,$mat)->get();
                
                foreach ($Jewelrysearch as $Jew )
                {
                    array_push($Dataarray1,$Jew);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function HVSearch(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $new = $request->input('new');
        if($price !=NULL &&  $new !=NULL && $name !=NULL )
        {
            $Dataarray1 = [];
//            {
                $search = [
                    ['name', '=' ,$name],
                    ['price', '<=' ,$price],
                    ['new', '=' ,$new]
                   
                ];
                $HVsearch = HighValue::where($search)->get();
                
                foreach ($HVsearch as $HV )
                {
                    array_push($Dataarray1,$HV);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function HVSearchByPrice(Request $request)
    {
        $price = $request->input('price');
 
        if($price !=NULL)
        {
            $Dataarray1 = [];
//            {
                $HVsearch = HighValue::where('price', '<=' ,$price)->get();
                
                foreach ($HVsearch as $HV )
                {
                    array_push($Dataarray1,$HV);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function HVSearchByname(Request $request)
    {
        $name = $request->input('name');
 
        if($name !=NULL)
        {
            $Dataarray1 = [];
//            {
                $HVsearch = HighValue::where('name', '=' ,$name)->get();
                
                foreach ($HVsearch as $HV )
                {
                    array_push($Dataarray1,$HV);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function PropertySearch(Request $request)
    {
        $city = $request->input('city');
        $rental = $request->input('rental');
        $type = $request->input('type');
        $floors = $request->input('floors');
        $furnished = $request->input('furnished');
        $price = $request->input('price');
        $new = $request->input('new');
        $rooms = $request->input('rooms');
        $SizeInMeter = $request->input('SizeInMeter');
        $Guarant = $request->input('Guarant');
        if($rooms !=NULL && $SizeInMeter !=NULL && $Guarant != NULL && $furnished !=NULL && $price !=NULL && $type !=NULL && $floors !=NULL && $city !=NULL && $new !=NULL && $rental !=NULL )
        {
            $Dataarray1 = [];
//            {
                $search = [
                    ['city', '=' ,$city],
                    ['rental', '<=' ,$rental],
                    ['type', '=' ,$type],
                    ['floors', '>=' ,$floors],
                    ['price', '<=' ,$price],
                    ['new', '=' ,$new],
                    ['furnished', '=' ,$furnished],
                    ['rooms', '>=' ,$rooms],
                    ['SizeInMeter', '>=' ,$SizeInMeter],
                    ['Guarant', '=' ,$Guarant]
                ];
                $PROPsearch =property::where($search)->get();
                
                foreach ($PROPsearch as $PROP )
                {
                    array_push($Dataarray1,$PROP);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function PropertySearchByCity(Request $request)
    {
        $city = $request->input('city');
 
        if($city !=NULL)
        {
            $Dataarray1 = [];
//            {
                $PROPsearch = property::where('city', '=' ,$city)->get();
                
                foreach ($PROPsearch as $PROP )
                {
                    array_push($Dataarray1,$PROP);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function PropertySearchByRental(Request $request)
    {
        $rental = $request->input('rental');
 
        if($rental !=NULL)
        {
            $Dataarray1 = [];
//            {
                $PROPsearch = property::where('rental', '=' ,$rental)->get();
                
                foreach ($PROPsearch as $PROP )
                {
                    array_push($Dataarray1,$PROP);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function PropertySearchByType(Request $request)
    {
        $type = $request->input('type');
 
        if($type !=NULL)
        {
            $Dataarray1 = [];
//            {
                $PROPsearch = property::where('type', '=' ,$type)->get();
                
                foreach ($PROPsearch as $PROP )
                {
                    array_push($Dataarray1,$PROP);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function PropertySearchByFurnished(Request $request)
    {
        $furnished = $request->input('furnished');
 
        if($furnished !=NULL)
        {
            $Dataarray1 = [];
//            {
                $PROPsearch = property::where('furnished', '=' ,$furnished)->get();
                
                foreach ($PROPsearch as $PROP )
                {
                    array_push($Dataarray1,$PROP);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function PropertySearchByPrice(Request $request)
    {
        $price = $request->input('price');
 
        if($price !=NULL)
        {
            $Dataarray1 = [];
//            {
                $PROPsearch = property::where('price', '<=' ,$price)->get();
                
                foreach ($PROPsearch as $PROP )
                {
                    array_push($Dataarray1,$PROP);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function PropertySearchBySize(Request $request)
    {
        $SizeInMeter = $request->input('SizeInMeter');
 
        if($SizeInMeter !=NULL)
        {
            $Dataarray1 = [];
//            {
                $PROPsearch = property::where('SizeInMeter', '>=' ,$SizeInMeter)->get();
                
                foreach ($PROPsearch as $PROP )
                {
                    array_push($Dataarray1,$PROP);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function VichleSearch(Request $request)
    {
        $price = $request->input('price');
        $status = $request->input('status');
        $type = $request->input('type');
        $model = $request->input('model');
        $year = $request->input('year');
        if($price !=NULL && $status !=NULL && $type !=NULL && $model !=NULL && $year !=NULL)
        {
            $Dataarray1 = [];
//            {
                $search = [
                    ['price', '<=' ,$price],
                    ['new', '=' ,$status],
                    ['type', '=' ,$type],
                    ['model', '=' ,$model],
                    ['year', '>=' ,$year]
                ];
                $carssearch = vichle::where($search)->get();
                
                foreach ($carssearch as $car )
                {
                    array_push($Dataarray1,$car);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function VichleSearchByPrice(Request $request)
    {
        $price = $request->input('price');
 
        if($price !=NULL)
        {
            $Dataarray1 = [];
//            {
                $carssearch = vichle::where('price', '<=' ,$price)->get();
                
                foreach ($carssearch as $car )
                {
                    array_push($Dataarray1,$car);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function VichleSearchByModel(Request $request)
    {
        $model = $request->input('model');
 
        if($model !== NULL)
        {
            $Dataarray1 = [];
//            {
                $carssearch = vichle::where('model', '=' ,$model)->get();
                
                foreach ($carssearch as $car )
                {
                    array_push($Dataarray1,$car);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function VichleSearchByStatus(Request $request)
    {
        $status = $request->input('status');
 
        if($status !== NULL)
        {
            $Dataarray1 = [];
//            {
                $carssearch = vichle::where('status', '=' ,$status)->get();
                
                foreach ($carssearch as $car )
                {
                    array_push($Dataarray1,$car);
                }
                $count = "Count of items :".count($Dataarray1);
                array_push($Dataarray1,$count);
                return response()->json($Dataarray1);
//            }
        }
        else
        {
            return response()->json("Null Search not allowed");
        }
    }
    public function Search (Request $request)
    {
        $table = $request->input('table');
        $attribute = $request->input('attribute');
        $value = $request->input('value');
        $sign = $request->input('sign');
        switch($table)
        {
            case cars :
            $Dataarray1 = [];
            //            {
            
                            $carssearch = cars::where("$attribute", "$sign" ,$value)->get();
                            
                            foreach ($carssearch as $car )
                            {
                                array_push($Dataarray1,$car);
                            }
                            $count = "Count of items :".count($Dataarray1);
                            array_push($Dataarray1,$count);
                            return response()->json($Dataarray1);
                            break ;
            //            }
            case highvalue :
            $Dataarray1 = [];
            //            {
            
                            $highvaluesearch = HighValue::where("$attribute", "$sign" ,$value)->get();
                            
                            foreach ($highvaluesearch as $hv )
                            {
                                array_push($Dataarray1,$hv);
                            }
                            $count = "Count of items :".count($Dataarray1);
                            array_push($Dataarray1,$count);
                            return response()->json($Dataarray1);
                            break ;
            //            }
            
            case property :
            $Dataarray1 = [];
            //            {
            
                            $propertysearch = property::where("$attribute", "$sign" ,$value)->get();
                            
                            foreach ($propertysearch as $prop )
                            {
                                array_push($Dataarray1,$prop);
                            }
                            $count = "Count of items :".count($Dataarray1);
                            array_push($Dataarray1,$count);
                            return response()->json($Dataarray1);
                            break ;
            //            }
            case jewelry :
            $Dataarray1 = [];
            //            {
            
                            $jewelrysearch = jewelry::where("$attribute", "$sign" ,$value)->get();
                            
                            foreach ($jewelrysearch as $jew )
                            {
                                array_push($Dataarray1,$jew);
                            }
                            $count = "Count of items :".count($Dataarray1);
                            array_push($Dataarray1,$count);
                            return response()->json($Dataarray1);
                            break ;
            //            }
            case vichle :
            $Dataarray1 = [];
            //            {
            
                            $vichlesearch = vichle::where("$attribute", "$sign" ,$value)->get();
                            
                            foreach ($vichlesearch as $vic )
                            {
                                array_push($Dataarray1,$vic);
                            }
                            $count = "Count of items :".count($Dataarray1);
                            array_push($Dataarray1,$count);
                            return response()->json($Dataarray1);
                            break ;
            //            }
            default:
                            return response()->json("No Such Table please insert s valid Table name !");
                            break ;
        }
    }
}