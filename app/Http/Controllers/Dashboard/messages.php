<?php

namespace App\Http\Controllers\Dashboard;

use App\cars;
use App\Http\Controllers\Controller;
use App\Mail\orderpassword;
use App\Mail\OrderReply;
use App\Message;
use App\notifications;
use App\User;
use App\vichle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class messages extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::paginate(4);
        return view('dashboard.messages.index',compact('messages'));
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
        return view('dashboard.messages.create',compact('ownerid_mess','email'));
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
                   'Message' =>'تم الرد على الرسالة المرسالة :'.$msgreply['reply']
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
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect()->route('dashboard.messages.index')->with('message','data is deleted');
    }
}
