<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //adminmainpage
    public function AdminMainPage(){
        return view('Admin.main');
    }

}
