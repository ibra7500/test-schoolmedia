<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Login extends Controller{
    
    public function index(){
        return view('login.index');
    }

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('dashboard');
        }    
        return redirect()->route('login')->with('error', 'Email atau Password salah!');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/');
    }
}