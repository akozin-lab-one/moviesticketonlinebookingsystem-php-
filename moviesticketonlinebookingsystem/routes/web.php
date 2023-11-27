<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CinemaRoomSeat;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\CinemasController;


Route::middleware(['admin_auth'])->group(function () {
    Route::redirect('', 'loginPage');

    // register view
    Route::get('/regiterPage', [AuthController::class, 'UserRegisterPage'])->name('Auth#register');

    // Login View
    Route::get('/loginPage', [AuthController::class, 'UserLoginPage'])->name('Auth#login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
     // dashboard
     Route::get('dashboard', [AuthController::class, 'dashboardPage'])->name('dashboard');

     //admin
    Route::middleware(['admin_auth'])->group(function () {
        Route::prefix('admin')->group(function(){
            //adminmain
            Route::get('adminMain', [AdminController::class,'AdminMainPage'])->name('Admin#mainPage');

            //movies
            Route::prefix('movies')->group(function(){
                    //moviePage
                    Route::get('list', [MoviesController::class, 'movieListPage'])->name('Admin#movielist');

                    //createmovieList
                    Route::post('create',[MoviesController::class, 'movieCreateData'])->name('Admin#createmovie');

                    //editmoviePage
                    Route::post('edit/{id}',[MoviesController::class, 'movieEditPage'])->name('Admin#editmoviePage');

                    //editmovie
                    Route::post('edit/movies', [MoviesController::class, 'editMovie'])->name('Admin#movieEdit');

                    //deletemovieList
                    Route::post('delete/{id}',[MoviesController::class, 'movieDelete'])->name('Admin#deletemovie');

                    //createmoviesPage
                    Route::get('createPage',[MoviesController::class, 'moviesCreatePage'])->name('Admin#createmoviePage');

                    //category
                    Route::get('category', [MoviesController::class, 'categoryPage'])->name('Admin#category');

                    //createcategoryPage
                    Route::get('create/categorypage', [MoviesController::class, 'createCategoryPage'])->name('Admin#createcategory');

                    //createcategorypage
                    Route::post('create/category', [MoviesController::class, 'createCategory'])->name('Admin#create');

                    //createcategorypage
                    Route::post('delete/category/{id}', [MoviesController::class, 'deleteCategory'])->name('Admin#delete');
                });
            });

            //cinemaList
            Route::prefix('cinemas')->group(function(){

                //mainlist
                Route::get('list',[CinemasController::class, 'mainCinemaListPage'])->name('Admin#cinemalist');

                //createcinemaPage
                Route::get('create', [CinemasController::class, 'createCinemasPage'])->name('Admin#cinemacreatePage');

                //createcinema
                Route::post('create/cinema',[CinemasController::class, 'Cinemacreation'])->name('Admin#cinemaCreation');

                //deletecinema
                Route::post('delete/cinema/{id}',[CinemasController::class, 'CinmeaDeleteData'])->name('Admin#deleteCinema');

                //editcinemaPage
                Route::post('edit/cinema/{id}',[CinemasController::class, 'CinmeaEditDataPage'])->name('Admin#editCinemaPage');

                //editCinema
                Route::post('edit/cinema',[CInemasController::class, 'editCinema'])->name('Admin#editCinema');
            });

            //cinemaRoomList
            Route::prefix('cinemasRoom')->group(function(){
                //mainlist
                Route::get('List',[CinemasController::class, 'CinemasRoomListPage'])->name('Admin#cinemasRoomList');

                //createroomListPage
                Route::get('create',[CinemasController::class, 'createCinemasRoomPage'])->name('Admin#cinemasRoomPage');

                //createroomlist
                Route::post('create/list', [CinemasController::class, 'createCinemasRoom'])->name('Admin#createCinemasRoom');

                //editroomlistPage
                Route::post('edit/listitem/{id}',[CinemasController::class,'EditCinemasPage'])->name('Admin#editCinemaRoomPage');

                //editlist
                Route::post('edit/Item',[CinemasController::class, 'EditCinemasRooms'])->name('Admin#editCinemasRooms');

                //deleteroomlist
                Route::post('delete/list/{id}', [CinemasController::class, 'deleteCinemasRooms'])->name('Admin#deleteCinemasRoom');

            });

            //cinemaroomseat
            Route::prefix('cinemaRoomSeat')->group(function(){
                //mainpage
                Route::get('/mainlist',[CinemaRoomSeat::class, 'RoomSeatListPage'])->name('Admin#roomseatpage');

                //createlistPage
                Route::get('create/seatPage',[CinemaRoomSeat::class, 'createRoomSeatPage'])->name('Admin#createseatpage');

                //createlist
                Route::post('create/seatlist', [CinemaRoomSeat::class, 'createRoomSeat'])->name('Admin#createcinemasRoomseat');

                //editroomseatListpage
                Route::post('edit/roomseats/{id}',[CinemaRoomSeat::class,'editRoomSeatPage'])->name('Admin#editRoomseatPage');

                //editroomseat
                Route::post('edit/roomseat', [CinemaRoomSeat::class, 'EditRoomSeats'])->name('Admin#editroomSeat');

                //deletelist
                Route::post('delete/seat/{id}',[CinemaRoomSeat::class, 'deleteRoomSeat'])->name('Admin#deletelist');
            });

            //cinemaroomseatprices
            Route::prefix('cinemaRoomSeatPrice')->group(function(){
                //mainlist
                Route::get('mainlist',[CinemaRoomSeat::class, 'SeatPriceList'])->name('Admin#mainseatPriceList');

                //createseatprices
                Route::get('create/seatprice',[CinemaRoomSeat::class,'CreateSeatPricePage'])->name('Admin#createseatpricePage');

                //createpricelist
                Route::post('create/seatpriceonce',[CinemaRoomSeat::class,'SeatPriceCreateion'])->name('Admin#seatpricecreation');

                //editpricelistPage
                Route::post('edit/pricelist/{id}',[CinemaRoomSeat::class, 'editSeatPricePage'])->name('Admin#editseatprice');

                //editseatprice
                Route::post('edit/seatprice',[CinemaRoomSeat::class, 'editSeatPrice'])->name('Admin#seatPriceedit');

                //deletepriceList
                Route::post('delete/seatprice/{id}',[CinemaRoomSeat::class,'DeleteSeatPrice'])->name('Admin#deleteseatPrice');
            });

    });

    Route::middleware(['user_auth'])->group(function () {
        Route::prefix('user')->group(function(){
            //usermain
            Route::get('userMain', [UserController::class,'UserMainPage'])->name('User#mainPage');

        });
    });
});
