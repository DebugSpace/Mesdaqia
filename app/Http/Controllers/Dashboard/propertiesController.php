<?php

namespace App\Http\Controllers\Dashboard;

use App\property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class propertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        //
        public function index()
        {
            $properties = property::paginate(4);
            return view('dashboard.properties.index',compact('properties'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('dashboard.properties.create');
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
                    'location'=>'required',
                    'price'=>'required',
                    'new'=>'required',
                    'status'=>'required',
                    'Auction_type'=>'required',
                    'Guarant'=>'required',
                    'image'=>'required'
                ]
            );

    //        ******************************
            $change = new property($request->all());
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('productimages'), $imageName);
            $change->image = $imageName;
            $change->type = $request->input('type');
            $change->area = $request->input('area');
            $change->street = $request->input('street');
            $change->city = $request->input('city');
            $change->rental = $request->input('rental');
             $change->new = $request->input('new');
            $change->status = $request->input('status');
            $change->Auction_type = $request->input('Auction_type');
            $change->floors = $request->input('floors');
            $change->furnished = $request->input('furnished');
            $change->price = $request->input('price');
            $change->rooms = $request->input('rooms');
            $change->SizeInMeter = $request->input('SizeInMeter');
            $change->location = $request->input('location');
    //        $change->ownerID = $request->input('ownerID');
            $change->save();
            session()->flash('success',__('site.added_successfully'));
            return redirect()->route('dashboard.properties.index');
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\properties  $properties
         * @return \Illuminate\Http\Response
         */
        public function show(properties $properties)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\properties  $properties
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $properties = property::find($id);
            return view('dashboard.properties.edit',compact('properties'));

        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\properties  $properties
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            $request->validate(
                [
                    'type'=>'required',
                    'location'=>'required',
                    'price'=>'required',
                    'new'=>'required',
                    'status'=>'required',
                    'Auction_type'=>'required',
                    'Guarant'=>'required',
                    'image'=>'required'
                ]
            );


            $change=property::find($id);
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('productimages'), $imageName);
            $change->image = $imageName;
            $change->type = $request->input('type');
            $change->area = $request->input('area');
            $change->street = $request->input('street');
            $change->city = $request->input('city');
            $change->rental = $request->input('rental');
             $change->new = $request->input('new');
            $change->status = $request->input('status');
            $change->Auction_type = $request->input('Auction_type');

            $change->floors = $request->input('floors');
            $change->furnished = $request->input('furnished');
            $change->price = $request->input('price');
            $change->rooms = $request->input('rooms');
            $change->SizeInMeter = $request->input('SizeInMeter');
            $change->location = $request->input('location');
    //        $change->ownerID = $request->input('ownerID');
    $change->update();
    session()->flash('success',__('site.added_successfully'));
            return redirect()->route('dashboard.properties.index');




        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\vichles  $vichles
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $properties = property::find($id);
            $properties->delete();
            return redirect()->route('dashboard.properties.index')->with('message','data is deleted');
        }


}








