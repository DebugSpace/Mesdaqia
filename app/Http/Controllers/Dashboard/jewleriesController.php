<?php

namespace App\Http\Controllers\Dashboard;


use App\jewelry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class jewleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jewl = jewelry::paginate(4);
        return view('dashboard.jewleries.index',compact('jewl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jewleries.create');
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
                'material'=>'required',
                'gender'=>'required',
                'weight'=>'required',
                'price'=>'required',
                'new'=>'required',
                'Auction_type'=>'required',
                'location'=>'required',
                'Guarant'=>'required',
                'status'=>'required',
                'image'=>'required',
            ]
        );
//        ******************************
        $change = new jewelry($request->all());
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('productimages'), $imageName);
        $change->image = $imageName;
        $change->type = $request->input('type');
        $change->material = $request->input('material');
        $change->gender = $request->input('gender');
        $change->weight = $request->input('weight');
        $change->price = $request->input('price');
        $change->new = $request->input('new');
        $change->Auction_type = $request->input('Auction_type');
        $change->location = $request->input('location');
        $change->Guarant = $request->input('Guarant');
        $change->status = $request->input('status');
        $change->save();
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.jewleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jewelry  $jewelry
     * @return \Illuminate\Http\Response
     */
    public function show(jewelry $jewelry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jewelry  $jewelry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jewlery = jewelry::find($id);
        return view('dashboard.jewleries.edit',compact('jewlery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jewelry  $jewelry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'type'=>'required',
                'material'=>'required',
                'gender'=>'required',
                'weight'=>'required',
                'price'=>'required',
                'new'=>'required',
                'Auction_type'=>'required',
                'location'=>'required',
                'Guarant'=>'required',
                'image'=>'required',
                'status'=>'required',
            ]
        );
//        ******************************
        $change = jewelry::find($id);
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('productimages'), $imageName);
        $change->image = $imageName;
        $change->type = $request->input('type');
        $change->material = $request->input('material');
        $change->gender = $request->input('gender');
        $change->weight = $request->input('weight');
        $change->price = $request->input('price');
        $change->new = $request->input('new');
        $change->Auction_type = $request->input('Auction_type');
        $change->location = $request->input('location');
        $change->Guarant = $request->input('Guarant');
        $change->status = $request->input('status');

        $change->update();
        session()->flash('success',__('site.update_successfully'));
        return redirect()->route('dashboard.jewleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jewelry  $jewelry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jewelry = jewelry::find($id);
        $jewelry->delete();
        return redirect()->route('dashboard.jewleries.index')->with('message','data is deleted');
    }
}
