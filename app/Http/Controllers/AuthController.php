<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('home');
    }


    public function auth(Request $request)
    {
        $credentials = $request->only('login', 'password');

        $user = Admin::where('login', $credentials['login'])
            ->where('password',md5($credentials['password']))
            ->first();
        if($user){
            //if (Auth::guard('admin')->attempt($credentials,($request->input('remember')))) {
            if(Auth::loginUsingId($user->id,true)){
                // Аутентификация успешна...
                return redirect()->intended('home');
            }
        }
        dd($user);
        return redirect(route('auth.login'));

    }
}