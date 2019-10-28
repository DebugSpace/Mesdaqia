<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|unique:users|max:100|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'name' => 'required',
            'role' => 'required',
            'phone' => 'required|numeric'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = new User;
        $user->create($validatedData);
        $token = $user->createToken('My Token', [$validatedData['role']])->accessToken;

        return response()->json(['status'=>true,'msg' => 'Account Created Successfully'], 201);
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $role = Auth::user()->role;
            $token = Auth::user()->createToken('My Token', [$role])->accessToken;
            return response()->json(['status'=>true,'token' => $token,'user'=>Auth::user()], 200);
        } else {
            return response()->json(['status'=> false,'msg'=>'wrong data'], 401);
        }
    }

        public function logout() {
        $accessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();
        return response()->json(true, 204);
    }
}

