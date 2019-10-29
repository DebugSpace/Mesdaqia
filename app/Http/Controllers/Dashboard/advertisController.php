<?php

namespace App\Http\Controllers\Dashboard;

use App\Add_im_text;
use App\advertis;
use App\HighValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class advertisController extends Controller
{

    public function index()
    {
        $adver = advertis::paginate(4);
        return view('dashboard.advertising.index',compact('adver'));
    }


    public function create()
    {
        return view('dashboard.advertising.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'image'=>'required',
                'title'=>'required',
                'content'=>'required',
                'url'=>'required',
            ]
        );
        $change = new advertis($request->all());
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('productimages'), $imageName);
        $change->image = $imageName;
        $change->title = $request->input('title');
        $change->content = $request->input('content');
        $change->url = $request->input('url');
        $change->save();
//        Add_im_text::create($change);
        session()->flash('success',__('site.added_successfully'));
        return redirect()->route('dashboard.advertising.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $change = advertis::find($id);
        return view('dashboard.advertising.edit',compact('change'));
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'image'=>'required',
                'title'=>'required',
                'content'=>'required',
                'url'=>'required',
            ]
        );
        $add_im_text=advertis::find($id);
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('productimages'), $imageName);
        $add_im_text->image = $imageName;
        $add_im_text->title = $request->input('title');
        $add_im_text->content = $request->input('content');
        $add_im_text->url = $request->input('url');
        $add_im_text->update();
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.advertising.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ch = advertis::find($id);
        $ch->delete();
        session()->flash('success',__('site.deleted_successfully'));
        return redirect()->route('dashboard.advertising.index');
    }
}
