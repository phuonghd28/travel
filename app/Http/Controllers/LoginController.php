<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm() {
        return view('login');
    }
    public function login(LoginRequest $request){
        $request->validated();
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('listType');
        }
        else{
            return back()->with('error-login','Invalid account and/or password. Please check and try again.');
        }

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
