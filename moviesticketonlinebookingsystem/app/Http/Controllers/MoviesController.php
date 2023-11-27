<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\MovieCategories;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MoviesController extends Controller
{

        //movieList
        public function movieListPage(){
            $movies = Movies::select('movies.id','movie_title','movie_categories.name as categoryName','statuses.name','release_date', 'duration','photo')
                                    ->join('movie_categories', 'movies.category_id' ,'movie_categories.id')
                                    ->join('statuses', 'movies.status_id', 'statuses.id')
                                    ->get();
            // dd($movies->toArray());
            return view('Admin.movies.movie',compact('movies'));
        }

        //createmoviepage
        public function moviesCreatePage(){
            $categories = MovieCategories::select('id','name')->get();
            $statuses = Status::select('id','name')->get();
            // dd($categories->toArray());
            return view('Admin.movies.createmovie',compact('categories','statuses'));
        }

        //createmovie
        public function movieCreateData(Request $request){
            // dd($request->toArray());
            $this->validateMovies($request);
            $data = $this->requestMovieData($request,'create');

            $fileName = uniqid() . $request->file('moviePhoto')->getClientOriginalName();
            $request->file('moviePhoto')->storeAs('public', $fileName);
            $data['photo'] = $fileName;

            Movies::create($data);

            return back()->with(['successcreatemovie' => 'movie is successfully created']);
        }

        //editmoviePage
        public function movieEditPage($id){
            // dd($id);
            $categories = MovieCategories::select('id','name')->get();
            $movies = Movies::select('movies.id','movie_title as movieTitle','movies.category_id','release_date as releaseDate','duration','photo')
                                ->where('movies.id',$id)
                                ->first();
            // dd($movies->photo);
            return view('Admin.movies.edit', compact('movies', 'categories'));
        }

        //editmovie
        public function editMovie(Request $request){
            // dd($request->toArray());
            $this->validateMovies($request);
            // dd(true);
            $data = $this->requestMovieData($request,"edit");
            // dd($data);

            if ($request->hasFile('moviePhoto')) {
                $db_image = Movies::where('id',$request->movieId)->first();
                $db_image = $db_image->photo;
                // dd($db_image);

                if ($db_image != null) {
                    Storage::delete(['public/' . $db_image]);
                    // dd(true);
                }

                $fileName = uniqid() . $request->file('moviePhoto')->getClientOriginalName();
                // dd($fileName);
                $request->file('moviePhoto')->storeAs('public', $fileName);
                $data['photo'] = $fileName;
                // dd($data);
            }
            // dd($data);

            Movies::where('id',$request->movieId)->update($data);
            // dd(true);
            return redirect()->route('Admin#movielist')->with(['editSuccess' => 'movie data is successfully edited']);
        }

        //deletemovie
        public function movieDelete($id){
            Movies::where('id',$id)->delete();
            return back()->with(['deletesuccessmovie'=>'movie is successfully deleted.']);
        }

        //categoryPage
        public function categoryPage(){
            $categories = MovieCategories::select('id','name')->get();
            // dd($categories->toArray());
            return view('Admin.movies.category',compact('categories'));
        }

        //deletecategory
        public function deleteCategory($id){
            MovieCategories::where('id',$id )->delete();
            return back()->with(['deleteCategory'=>'category is successfully deleted.']);
        }

        //createcategory
        public function createCategoryPage(){
            return view('Admin.movies.createcategory');
        }

        //createcategory
        public function createCategory(Request $request){
            // dd($request->toArray());
            $this->validateCategory($request);
            $data = $this->requestCategoryData($request);
            // dd($data);
            MovieCategories::create($data);

            return redirect()->back()->with(['successCategory'=>'movie category is successfully created']);
        }

        //validatemovieData
        private function validateMovies($request){
            // dd($status);

            // $status === "create"
            Validator::make($request->all(),[
                'movieTitle'=>'required|min:6',
                'movieCategory'=>'required',
                'movieStatus' => 'required',
                'movieRelease'=>'required|date',
                'movieDuration'=>'required',
                'moviePhoto'=>'required|mimes:jpg,jpeg,png'
            ]);
        }

        //requestmovieData
        private function requestMovieData($request, $status){
            if ($status === "edit") {
                return [
                    'movie_title' => $request->movieTitle,
                    'category_id' => $request->movieCategory,
                    'status_id' => $request->movieStatus,
                    'release_date' => $request->movieRelease,
                    'duration' => $request->movieDuration,
                    'photo' => $request->moviePhoto
                 ];
            }elseif ($status !== 'edit') {
                return [
                    'movie_title' => $request->movieTitle,
                    'category_id' => $request->movieCategory,
                    'status_id' => $request->movieStatus,
                    'release_date' => $request->movieRelease,
                    'duration' => $request->movieDuration,
                    // 'photo' => $request->moviePhoto
                 ];
            }
        }

        //validatecategory
        private function validateCategory(Request $request){
            // dd($request->toArray());
            Validator::make($request->all(),[
                'name'=>'required|max:15'
            ]);
        }

        //requestcategoryData
        private function requestCategoryData(Request $request){
            return [
                'name' => $request->categoryName
            ];
        }
}
