<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class StoreMessController extends Controller
{
    protected function storemessage(Request $request)
    {
        $em =  $request->email;
        $msg = Message::create(
            [
                'ownerID'=>$request->ownerID,
                'content'=>$request['content'],
                'email'  =>$em,
            ]
        );

        session()->flash('success',__('site.send_support_to_Admin'));
        return back();
    }
}
