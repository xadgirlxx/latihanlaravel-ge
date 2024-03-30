<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('start');
});

Route::get('/thisindex', function () {
    return view('index');
});

Route::get('/profile',[UserController::class, 'index'])->name ('UserIndex'); 
Route::get('/tambahuser',[userController::class,'tambah']);
Route::post('/kirimuser',[userController::class,'add']);
route::get('/profile/properties/{id}', [UserController::class, 'properties']);
route::get('/profile/edit/{id}',[UserController::class, 'detailedit']);
route::post('/editprofile/{id}', [UserController::class,'edit']);
route::get('/profile/remove/{id}',[UserController::class, 'remove']);