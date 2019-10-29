<?php

namespace App\Http\Controllers\Dashboard;

use App\Add_im_text;
use App\Auth_car;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AddImageTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $add_ImageAndTexts = Add_im_text::all();
        return view('dashboard.AddImgText.index',compact('add_ImageAndTexts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.AddImgText.create');
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
                'image'=>'required',
                'content'=>'required',
            ]
        );
        $change = new Add_im_text($request->all());
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('productimages'), $imageName);
        $change->image = $imageName;
        $change->content = $request->input('content');
        $change->save();
//        Add_im_text::create($change);
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.addtextimage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Add_im_text  $add_im_text
     * @return \Illuminate\Http\Response
     */
    public function show(Add_im_text $add_im_text)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Add_im_text  $add_im_text
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $change = Add_im_text::find($id);
        return view('dashboard.AddImgText.edit',compact('change'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Add_im_text  $add_im_text
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate(
            [
                'image'=>'required',
                'content'=>'required',
            ]
        );
        $add_im_text=Add_im_text::find($id);
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('productimages'), $imageName);
        $add_im_text->image = $imageName;
        $add_im_text->content = $request->input('content');
        $add_im_text->update();
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.addtextimage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Add_im_text  $add_im_text
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ch = Add_im_text::find($id);
        $ch->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('dashboard.addtextimage.index');
    }
}
