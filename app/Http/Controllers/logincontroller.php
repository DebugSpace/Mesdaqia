<?php

namespace App\Http\Controllers;

use App\Register_user;
use App\User;
use Illuminate\Http\Request;
use Validator;
class logincontroller extends Controller
{
    public function login(Request $request)
    {
        $Remm = $request->get('email');
        $Rpss = $request->get('pass');
        $id   = $request->get('id');
        if ($request->isMethod('post')) {
            $data = User::all();
            foreach ($data as $dataM) {
                $em = $dataM->email;
                $pas = $dataM->password;
                $id = $dataM->id;
                $name = $dataM->name;
                if (($em == $Remm) && ($pas == $Rpss)) {
                    $request->session()->put('email',$em);
                    return redirect()->route('add_product',
                        [
                            'email'=>$request->session()->put('email',$em),
                            'password'=>$request->session()->put('password',$pas),
                            'id'=>$request->session()->put('id',$id),
                            'name'=>$request->session()->put('name',$name)
                        ]);
                }
            }
        }
        return view('MenubarViews.mesdakia');
    }
    protected function editacount(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $newpassword = $request->input('newPassword');
        $confirmPassword = $request->input('confirmPassword');
        if($newpassword==$confirmPassword) {
            $user = User::find($id);
            $user->name = $name;
            $user->email = $email;
            $user->password = $newpassword;
            $user->save();
            return redirect('/mesdakia');
        }
        return redirect()->back()->with('message','confirm password not equal password');
    }
}
