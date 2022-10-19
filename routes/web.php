<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryuserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
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

//Login
Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'create']);
Route::post('/logout',[LoginController::class,'destroy']);


//Users
Route::get('/users',[UserController::class,'index']);
Route::get('/users/create',[UserController::class,'create']);
Route::post('/users/create',[UserController::class,'store']);
Route::get('/users/{user}',[UserController::class,'show']);
Route::get('/users/update/{user}',[UserController::class,'edit']);
Route::patch('/users/update/{user}',[UserController::class,'update']);
Route::delete('/users/delete/{user}',[UserController::class,'destroy']);

//Category
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/categories/create',[CategoryController::class,'create']);
Route::post('/categories/create',[CategoryController::class,'store']);
Route::get('/categories/show/{category}',[CategoryController::class,'show']);
Route::get('/categories/update/{category}',[CategoryController::class,'edit']);
Route::patch('/categories/update/{category}',[CategoryController::class,'update']);
Route::delete('/categories/delete/{category}',[CategoryController::class,'destroy']);


//password
Route::get('/passwords',[PasswordController::class,'index']);
Route::get('/passwords/create',[PasswordController::class,'create']);
Route::post('/passwords/create',[PasswordController::class,'store']);
Route::get('/passwords/show/{password}',[PasswordController::class,'show']);
Route::get('/passwords/update/{password}',[PasswordController::class,'edit']);
Route::patch('/passwords/update/{password}',[PasswordController::class,'update']);
Route::get('/passwords/delete/{password}',[PasswordController::class,'delete']);
