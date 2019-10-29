<?php


namespace App\Http\Controllers;

use App\cars;
use App\HighValue;
use App\jewelry;
use App\property;
use App\vichle;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function CarSearch(Request $request){
        $price = $request->input('price');
        $status = $request->input('status');
        $type = $request->input('type');
        $model = $request->input('model');
        $year = $request->input('year');
        if($price !=NULL && $status !=NULL && $type !=NULL && $model !=NULL && $year !=NULL){
//            {
                $carssearch = cars::where([
                    ['price', '<=' ,$price],
                    ['new', '=' ,$status],
                    ['type', '=' ,$type],
                    ['model', '=' ,$model],
                    ['year', '>=' ,$year]
                ])->paginate(4);
//            }
        }
        elseif($price == NULL && $model != NULL){
            $carssearch = cars::where([
                ['model', '=' ,$model]
            ])->paginate(4);
            return view('Basic_pages.cars',compact('carssearch'));

        }
//       car type
        elseif($type != NULL && $model == NULL){
            $carssearch = cars::where([
                ['type', '=' ,$type]

            ])->paginate(4);
            return view('Basic_pages.cars',compact('carssearch'));

        }

        // search by price
        elseif(isset($price)){
            $carssearch = cars::where([['price', '<=' ,$price]])->paginate(4);
        }

        elseif (isset($year))
        {
            $carssearch = cars::where([
                ['year', '>=' ,$year]
            ])->paginate(4);
        }
        elseif (isset($status))
        {
            $carssearch = cars::where([
                ['new', '=' ,$status]
            ])->paginate(4);
        }

        return view('Basic_pages.cars',compact('carssearch'));
    }

    public function JewelrySearch(Request $request){
        $price = $request->input('price');
        $status = $request->input('status');
        $type = $request->input('type');
        $material = $request->input('material');
        $weight = $request->input('weight');
        // echo $price,$status,$type,$model,$year;
        if(isset($price) && isset($status) && isset($type) && isset($material) && isset($weight)) {
            $jewelrysearch = jewelry::where([
                ['price', '<=', $price],
                ['new', '=', $status],
                ['type', '=', $type],
                ['material', '=', $material],
                ['weight', '<=', $weight]
            ])->paginate(4);
        }
        elseif (isset($price)){
            $jewelrysearch = jewelry::where([
                ['price', '<=', $price]
            ])->paginate(4);
        }
        elseif (isset($status)){
            $jewelrysearch = jewelry::where([
                ['new', '=', $status]
            ])->paginate(4);
        }
        elseif (isset($type)){
            $jewelrysearch = jewelry::where([
                ['type', '=', $type]
            ])->paginate(4);
        }
        elseif (isset($material)){
            $jewelrysearch = jewelry::where([
                ['material', '=', $material]
            ])->paginate(4);
        }
        elseif (isset($weight)){
            $jewelrysearch = jewelry::where([
                ['weight', '<=', $weight]
            ])->paginate(4);
        }
        return view('Basic_pages.jewelrys',compact('jewelrysearch'));
    }
    public function PropertySearch(Request $request){
        $price = $request->input('price');
        $status = $request->input('status');
        $type = $request->input('type');
        $SizeInMeter = $request->input('SizeInMeter');
        $rooms = $request->input('rooms');
        $city = $request->input('city');
        $area = $request->input('area');
        // echo $price,$status,$type,$model,$year;
        if(isset($price)&&isset($status)&&isset($type)&&isset($SizeInMeter)&&isset($rooms)&&isset($city)&&isset($area)) {
            $proretysearch = property::where([
                ['price', '<=', $price],
                ['new', '=', $status],
                ['type', '=', $type],
                ['SizeInMeter', '<=', $SizeInMeter],
                ['rooms', '=', $rooms],
                ['city', '=', $city],
                ['area', '=', $area]
            ])->paginate(4);
        }

        elseif (isset($price)){
            $proretysearch = property::where([
                ['price', '<=', $price]
            ])->paginate(4);
        }
        elseif (isset($status)){
            $proretysearch = property::where([
                ['new', '=', $status]
            ])->paginate(4);
        }
        elseif (isset($type)){
            $proretysearch = property::where([
                ['type', '=', $type]
            ])->paginate(4);
        }
        elseif (isset($SizeInMeter)){
            $proretysearch = property::where([
                ['SizeInMeter', '<=', $SizeInMeter]
            ])->paginate(4);
        }
        elseif (isset($rooms)){
            $proretysearch = property::where([
                ['rooms', '=', $rooms]
            ])->paginate(4);
        }
        elseif (isset($city)){
            $proretysearch = property::where([
                ['city', '=', $city]
            ])->paginate(4);
        }
        elseif (isset($area)){
            $proretysearch = property::where([
                ['area', '=', $area]
            ])->paginate(4);
        }
        return view('Basic_pages.properties',compact('proretysearch'));
    }
    public function VichleSearch(Request $request){
        $price = $request->input('price');
        $status = $request->input('status');
        $type = $request->input('type');
        $model = $request->input('model');
        $year = $request->input('year');
        // $color = $request->input('color');
        // echo $price,$status,$type,$model,$year;
        if($price !=NULL && $status !=NULL && $type !=NULL && $model !=NULL && $year !=NULL){

            $vichlesearch = vichle::where([
                ['price', '<=' ,$price],
                ['new', '=' ,$status],
                ['type', '=' ,$type],
                ['model', '=' ,$model],
                ['year', '=' ,$year]
                // ['color', '=' ,$color],
            ])->paginate(4);
            return view('Basic_pages.vichles',compact('vichlesearch'));
        }


        // search by price
        elseif($price !=NULL  && $model ==NULL ){
            $vichlesearch = vichle::where([
                ['price', '<=' ,$price]

            ])->paginate(4);
            return view('Basic_pages.vichles',compact('vichlesearch'));

        }
        //search by status
        elseif( $price ==NULL && $status !=NULL  ){
            $vichlesearch = vichle::where([
                ['new', '=' ,$status]

            ])->paginate(4);
            return view('Basic_pages.vichles',compact('vichlesearch'));
        }

        //sarch by type
        elseif(  $price ==NULL && $type !=NULL ){
            $vichlesearch = vichle::where([

                ['type', '=' ,$type]

            ])->paginate(4);
            return view('Basic_pages.vichles',compact('vichlesearch'));


        }
        //serch by model

        elseif($price ==NULL && $model !=NULL){
            $vichlesearch = vichle::where([

                ['model', '=' ,$model]

            ])->paginate(4);
            return view('Basic_pages.vichles',compact('vichlesearch'));
        }
        //search by year
        if($price ==NULL  &&  $year !=NULL){
            $vichlesearch = vichle::where([

                ['year', '>=' ,$year]
            ])->paginate(4);
            return view('Basic_pages.vichles',compact('vichlesearch'));

        }
    }
    public function HighvalueSearch(Request $request){
        $price = $request->input('price');
        $status = $request->input('status');
        $type = $request->input('type');
        $name= $request->input('name');
        if (isset($price) && isset($status) && isset($type) && isset($name)){
            $price = $request->input('price');
            $status = $request->input('status');
            $type = $request->input('type');
            $name = $request->input('name');
            // echo $price,$status,$type,$model,$year;
            $highvaluesearch = HighValue::where([
                ['price', '<=' ,$price],
                ['new', '=' ,$status],
                ['type', '=' ,$type],
                ['name', '=' ,$name]
            ])->paginate(4);
        }

        elseif (isset($price)){
            $highvaluesearch = HighValue::where([
                ['price', '<=' ,$price]
            ])->paginate(4);
        }
        elseif (isset($status)){
            $highvaluesearch = HighValue::where([
                ['new', '=' ,$status]
            ])->paginate(4);
        }
        elseif (isset($type)){
            $highvaluesearch = HighValue::where([
                ['type', '=' ,$type]
            ])->paginate(4);
        }
        elseif (isset($name)){
            $highvaluesearch = HighValue::where([
                ['name', '=' ,$name]
            ])->paginate(4);
        }
        return view('Basic_pages.hightvalues',compact('highvaluesearch'));
    }
}
