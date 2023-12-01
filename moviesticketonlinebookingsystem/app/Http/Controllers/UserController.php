<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Cinemas;
use Illuminate\Http\Request;
use App\Models\MovieCategories;

class UserController extends Controller
{
    //usermainpage
    public function UserMainPage(){
        $movies = Movies::select('id','movie_title','category_id','status_id','release_date','duration','photo')->get();
        $categories = MovieCategories::select('id','name')->get();
        $cinemas = Cinemas::select('id','name','location')->get();
        return view('User.movies.movieViews',compact('movies','categories','cinemas'));
    }

    //useraboutPage
    public function UserAboutPage(){
        // dd(url()->current());
        return view('User.movies.about');
    }
}
