<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::view('/', 'welcome')->name('home');

Route::middleware('loggedin')->group(function () {
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);

    Route::resource('/orders', OrderController::class);
});

Route::middleware("admin")->group(function(){
    Route::get('/users', [UserController::class, 'index']);
});


// Auth routes
Route::get('/signup', [AuthController::class, 'signupCreate'])
    ->name('auth.signup.create');
Route::post('/signup', [AuthController::class, 'signupStore'])
    ->name('auth.signup.store');

Route::get('/login', [AuthController::class, 'loginCreate'])
    ->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])
    ->name('auth.login.store');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('auth.logout');
