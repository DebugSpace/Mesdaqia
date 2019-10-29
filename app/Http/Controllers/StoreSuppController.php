<?php

namespace App\Http\Controllers;

use App\Support;
use Illuminate\Http\Request;

class StoreSuppController extends Controller
{
    protected function storesupport(Request $request)
    {
        $support = Support::create(
            [
                'ownerID'=>$request->ownerID,
                'content'=>$request['content'],
                'email'=>$request->email,
            ]
        );
        session()->flash('success',__('site.send_msg_to_Admin'));
        return back();
    }
}
