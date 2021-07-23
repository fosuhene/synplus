<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BannerController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin dashboard
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'admin'])->name('admin');

    //banner section
   Route::resource('/banner', BannerController::class);

   //post method route to update status
   Route::post('banner_status', [\App\Http\Controllers\BannerController::class, 'bannerStatus'])->name('banner.status');



});