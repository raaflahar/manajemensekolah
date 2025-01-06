<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email required',
            'password.required'=>'Password required',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('admin');
        } else {
            return redirect('')->withErrors('Email or Password wrong.')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
