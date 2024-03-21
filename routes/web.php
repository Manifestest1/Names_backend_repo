<?php

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () 
{
    return view('welcome');
});

 Route::get('/showuser',[AdminController::class,'showuser']);

 Route::get('/godnames',[AdminController::class,'god']);

 Route::get('/search_data',[AdminController::class,'search_data']);

 Route::get('/godnames',[AdminController::class,'god']);

Route::get('/search',[AdminController::class,'search']);
// Route::get('/showuser',function(){
//     return view('allusers');
 // });

