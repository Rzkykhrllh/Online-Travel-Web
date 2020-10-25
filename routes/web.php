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
    
Route::get('/detail/{slug}', "DetailController@index")
    ->name("detail");

//kirim data informasi checkout
Route::post('/checkout/{id}', "CheckoutController@process")
    ->name("checkout_process")
    ->middleware(["auth","verified"]);
    
//pergi ke halaman checkout
Route::get('/checkout/{id}', "CheckoutController@index")
    ->name("checkout")
    ->middleware(["auth","verified"]);

    
Route::post('/checkout/create/{detail_id}', "CheckoutController@create")
    ->name("checkout_create")
    ->middleware(["auth","verified"]);


Route::post('/checkout/remove/{detail_id}', "CheckoutController@remove")
    ->name("checkout_remove")
    ->middleware(["auth","verified"]);

    
Route::post('/checkout/confirm/{detail_id}', "CheckoutController@succes")
    ->name("checkout_success")
    ->middleware(["auth","verified"]);

    Route::post('/checkout/{id}', "CheckoutController@process")
    ->name("checkout_process")
    ->middleware(["auth","verified"]);
    
// //AYAM GORENG ENAK
// Route::post('/ayam', "CheckoutController@process")
//     ->name("ayam_process")
//     ->middleware(["auth","verified"]);

// Route::get('/ayam', "CheckoutController@index")
//     ->name("ayam")
//     ->middleware(["auth","verified"]);

    
// Route::post('/ayam/create/{detail_id}', "CheckoutController@create")
//     ->name("ayam_create")
//     ->middleware(["auth","verified"]);


// Route::post('/ayam/remove/{detail_id}', "CheckoutController@remove")
//     ->name("ayam_remove")
//     ->middleware(["auth","verified"]);

    
// Route::post('/ayam/confirm/{detail_id}', "CheckoutController@succes")
//     ->name("ayam_success")
//     ->middleware(["auth","verified"]);

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
