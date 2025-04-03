<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::view('/', 'welcome')->name('home');

Route::resource('/categories',CategoryController::class);
Route::resource('/products',ProductController::class);