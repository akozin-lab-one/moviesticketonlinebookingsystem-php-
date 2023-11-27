<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //LoginPage
    public function UserLoginPage(){
        return view('auth.login');
    }

    //RegisterPage
    public function UserRegisterPage(){
        return view('auth.register');
    }

    //dashboard
    public function dashboardPage(){
        if (Auth::user()->role == 'admin') {
            return redirect()->route('Admin#mainPage');
        }else{
            return redirect()->route('User#mainPage');
        }
    }
}
