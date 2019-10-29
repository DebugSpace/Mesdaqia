<?php

namespace App\Http\Controllers\Dashboard;

use App\vichle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class vichlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vichles = vichle::paginate(4);
        return view('dashboard.vichles.index',compact('vichles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.vichles.create');
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
        $change = new vichle($request->all());
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
        return redirect()->route('dashboard.vichles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vichles  $vichles
     * @return \Illuminate\Http\Response
     */
    public function show(vichles $vichles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vichles  $vichles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vichles = vichle::find($id);
        return view('dashboard.vichles.edit',compact('vichles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vichles  $vichles
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
        $vichles=vichle::find($id);
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('productimages'), $imageName);
        $vichles->image = $imageName;
        $vichles->type = $request->input('type');
        $vichles->vendor = $request->input('vendor');
        $vichles->location = $request->input('location');
        $vichles->price = $request->input('price');
        $vichles->color = $request->input('color');
        $vichles->year = $request->input('year');
        $vichles->new = $request->input('new');
        $vichles->status = $request->input('status');
        $vichles->Auction_type = $request->input('Auction_type');
        $vichles->Guarant = $request->input('Guarant');
        $vichles->update();
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.vichles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vichles  $vichles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vichles = vichle::find($id);
        $vichles->delete();
        return redirect()->route('dashboard.vichles.index')->with('message','data is deleted');
    }
}
