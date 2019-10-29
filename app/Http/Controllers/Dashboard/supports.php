<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\OrderReply;
use App\Message;
use App\notifications;
use App\Support;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class supports extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supports = Support::paginate(4);
        return view('dashboard.support.index',compact('supports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ownerid_mess = $_GET['ownerID'];
        $email = $_GET['email'];
        return view('dashboard.support.create',compact('ownerid_mess','email'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msgreply = $request->all();
        $user = User::where('id','=',$msgreply['ownerID'])->first();
        if($msgreply['ownerID']==$user->id){
            $notification = notifications::create(
                [
                    'ownerID' =>$msgreply['ownerID'],
                    'Message' =>'تم الرد على الدعم المرسل :'.$msgreply['reply']
                ]
            );
            session()->flash('success',__('site.send_notification_reply'));
            return back();
        }
        else {
            Mail::to($msgreply['email'])->send(new OrderReply($msgreply['reply']));
            session()->flash('success',__('site.send_notification_reply_email'));
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function edit(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Support  $support
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $support = Support::find($id);
        $support->delete();
        return redirect()->route('dashboard.supports.index')->with('message','data is deleted');
    }
}
