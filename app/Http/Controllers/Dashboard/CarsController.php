<?php

namespace App\Http\Controllers\Dashboard;

use App\Add_im_text;
use App\cars;
use App\jewelry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = cars::paginate(4);
        return view('dashboard.cars.index',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'type'=>'required',
                'vendor'=>'required',
                'location'=>'required',
                'price'=>'required',
                'color'=>'required',
                'year'=>'required',
                'new'=>'required',
                'status'=>'required',
                'Auction_type'=>'required',
                'Guarant'=>'required',
//                'ownerID'=>'required',
                'image'=>'required'

            ]
        );
//        ******************************
        $change = new cars($request->all());
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('productimages'), $imageName);
        $change->image = $imageName;
        $change->type = $request->input('type');
        $change->vendor = $request->input('vendor');
        $change->location = $request->input('location');
        $change->price = $request->input('price');
        $change->color = $request->input('color');
        $change->year = $request->input('year');
        $change->new = $request->input('new');
        $change->status = $request->input('status');
        $change->Auction_type = $request->input('Auction_type');
        $change->Guarant = $request->input('Guarant');
//        $change->ownerID = $request->input('ownerID');
        $change->save();
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show(cars $cars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = cars::find($id);
        return view('dashboard.cars.edit',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'type'=>'required',
                'vendor'=>'required',
                'location'=>'required',
                'price'=>'required',
                'color'=>'required',
                'year'=>'required',
                'new'=>'required',
                'status'=>'required',
                'Auction_type'=>'required',
                'Guarant'=>'required',
//                'ownerID'=>'required',
                'image'=>'required'
            ]
        );
        $cars=cars::find($id);
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('productimages'), $imageName);
        $cars->image = $imageName;
        $cars->type = $request->input('type');
        $cars->vendor = $request->input('vendor');
        $cars->location = $request->input('location');
        $cars->price = $request->input('price');
        $cars->color = $request->input('color');
        $cars->year = $request->input('year');
        $cars->new = $request->input('new');
        $cars->status = $request->input('status');
        $cars->Auction_type = $request->input('Auction_type');
        $cars->Guarant = $request->input('Guarant');
        $cars->update();
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = cars::find($id);
        $car->delete();
        return redirect()->route('dashboard.cars.index')->with('message','data is deleted');
    }
}
