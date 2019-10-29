<?php

namespace App\Http\Controllers;

use App\Register_user;
use App\User;
use Illuminate\Http\Request;

class registercontroller extends Controller
{
    public function store(Request $request){
        if($request->isMethod('post')) {
            $register_model = new User();
            $un = $register_model->name = $request->get('user');
            $em = $register_model->email = $request->get('email');
            $ps = $register_model->password = $request->get('pass');
            echo $un,$em,$ps;
            $register_model->save();
            return redirect('/add_product');
        }
        return view('MenubarViews.mesdakia');
    }

}
