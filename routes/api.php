<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\GodController;
use App\Http\Controllers\Api\ReligionController;
use App\Http\Controllers\Api\NicknameController;


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
Route::get('/links', [AdminController::class, 'index']);


Route::post('/add_godnames', [GodController::class, 'add_godnames']);
Route::get('/show_godnames', [GodController::class, 'show_godnames']);
Route::post('/edit_godnames/{id}', [GodController::class, 'edit_godnames']);
Route::post('/update_godnames/{id}', [GodController::class, 'update_godnames']);
Route::get('/delete_godnames/{id}', [GodController::class, 'delete_godnames']);
Route::get('/godlinks', [GodController::class, 'godindex']);

Route::post('/add_subgodname', [GodController::class, 'add_subgod_names']);
Route::get('/show_subgodnames/', [GodController::class, 'show_subgodnames']);
Route::get('/subgodindex/{id}', [GodController::class, 'subgodindex']);

Route::post('/add_religion', [ReligionController::class, 'add_religion']);
Route::get('/show_religion', [ReligionController::class, 'show_religion']);
Route::post('/edit_religion/{id}', [ReligionController::class, 'edit_religion']);
Route::post('/update_religion/{id}', [ReligionController::class, 'update_religion']);
Route::get('/delete_religion/{id}', [ReligionController::class, 'delete_religion']);
Route::get('/religionindex', [ReligionController::class, 'index']);

Route::post('/add_nickname',[NicknameController::class,'add_nicknames']);
Route::post('/edit_nicknames/{id}', [NicknameController::class, 'edit_nicknames']);
Route::post('/update_nicknames/{id}', [NicknameController::class, 'update_nicknames']);
Route::get('/delete_nickname/{id}', [NicknameController::class, 'delete_nicknames']);
Route::get('/nickname_index/{id}', [NicknameController::class, 'nicknameindex']);