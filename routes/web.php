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

<<<<<<< HEAD

Route::get('/login/google', function () 
{
    return Socialite::driver('google')->redirect();
});

Route::get('/login/google/callback', function () 
{
    $user = Socialite::driver('google')->user();
    dd($user);
    // Handle the authenticated user as needed
});

 Route::get('/showuser',[AdminController::class,'showuser']);

 Route::get('/search_data',[AdminController::class,'search_data']);
// Route::get('/showuser',function(){
//     return view('allusers');
 // });
=======
>>>>>>> e8d74322ea7c41147ebc884a9022c91a21000f1e
