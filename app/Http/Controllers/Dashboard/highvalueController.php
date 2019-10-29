<?php

namespace App\Http\Controllers\Dashboard;

use App\HighValue;
use App\jewelry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class highvalueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $highvalue = HighValue::paginate(4);
        return view('dashboard.highvalues.index',compact('highvalue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.highvalues.create');
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
                'name'=>'required',
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
        $change = new HighValue($request->all());
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('productimages'), $imageName);
        $change->image = $imageName;
        $change->type = $request->input('type');
        $change->name = $request->input('name');
        $change->price = $request->input('price');
        $change->new = $request->input('new');
        $change->Auction_type = $request->input('Auction_type');
        $change->location = $request->input('location');
        $change->Guarant = $request->input('Guarant');
        $change->status = $request->input('status');
        $change->save();
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.highvalues.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HighValue  $highValue
     * @return \Illuminate\Http\Response
     */
    public function show(HighValue $highValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HighValue  $highValue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $highValue = HighValue::find($id);
        return view('dashboard.highvalues.edit',compact('highValue'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HighValue  $highValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'type'=>'required',
                'name'=>'required',
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
        $change =HighValue::find($id);
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('productimages'), $imageName);
        $change->image = $imageName;
        $change->type = $request->input('type');
        $change->name = $request->input('name');
        $change->price = $request->input('price');
        $change->new = $request->input('new');
        $change->Auction_type = $request->input('Auction_type');
        $change->location = $request->input('location');
        $change->Guarant = $request->input('Guarant');
        $change->status = $request->input('status');
        $change->update();
        session()->flash('success',__('site.update_successfully'));
        return redirect()->route('dashboard.highvalues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HighValue  $highValue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $highValue = HighValue::find($id);
        $highValue->delete();
        return redirect()->route('dashboard.highvalues.index')->with('message','data is deleted');
    }
}
