<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "HomeController@index")
    ->name("home");  //method name itu untuk ngasih nama sebuah route, misal route ini bisa dipanggil home route
    
Route::get('/detail', "DetailController@index")
    ->name("detail");

Route::get('/checkout', "ChechkoutController@index")
    ->name("checkout");

Route::get('/checkout/success', "ChechkoutController@success")
    ->name("chechkout-success");
    
//jadi, semua route yg ada di dalam grup akan dapat prefix admin
// entar linknya namaweb/admin/
Route::prefix("admin")
    ->namespace("Admin") //biar gak nulis admin terus (mirip di c++, "using namespace std" biar gak nulis std)
    ->middleware(["auth","admin"]) //nambahin middleware yang bernama auth dan admin (bisa di cek di file kernel)
    ->group(function(){
        Route::get("/", "DashboardController@index")
            ->name("dashboard");

        Route::resource('travel-package', 'TravelPackageController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('transaction', 'TransactionController');
    });


//biar bisa verifikasi email, di dalam routes ditambahin [verify => true]
Auth::routes(["verify" => true]);
