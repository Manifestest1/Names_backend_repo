<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\GodController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the

 RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great! 
|
*/

Route::group(['middleware' => 'api','prefix'=>'auth'], function ($router) 
{
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']); 
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

});
Route::post('/add_names', [AdminController::class, 'add_names']);
Route::post('/show_names', [AdminController::class, 'show_names']);
Route::post('/edit_names/{id}', [AdminController::class, 'edit_names']);
Route::post('/update_names/{id}', [AdminController::class, 'update_names']);
Route::get('/delete_names/{id}', [AdminController::class, 'delete_names']);

Route::post('/add_godnames', [GodController::class, 'add_godnames']);
Route::get('/show_godnames', [GodController::class, 'show_godnames']);
Route::post('/edit_godnames/{id}', [GodController::class, 'edit_godnames']);
Route::post('/update_godnames/{id}', [GodController::class, 'update_godnames']);
Route::get('/delete_godnames/{id}', [GodController::class, 'delete_godnames']);

// Route::post('/edit_godnames', function()
// {
//     return response()->json([
//         'message' => 'Name successfully added',
//         'name' => "Ajay"
//     ], 201);

// });