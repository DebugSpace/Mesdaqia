<?php

namespace App\Http\Controllers;
use App\Mail\orderpassword;
use App\User;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function ship($id)
    {
        $user = User::find($id);
        Mail::to($user->email)->send(new orderpassword($id,$user->password,$user->name));
        return redirect('/add_product');
    }
}
