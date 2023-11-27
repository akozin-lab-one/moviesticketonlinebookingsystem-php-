<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //usermainpage
    public function UserMainPage(){
        return view('User.movies.movieViews');
    }
}
