<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::view('/', 'welcome')->name('home');

// redirection
Route::redirect('/hello-old', '/hello', 301);

Route::get('/hello', function () {
    return view('hello');
})->name('hello');

Route::post('/login', function (Request $request) {
    $username = $request->username;
    $password = $request->password;
    return "Login : $username / $password";
})->name('login');

Route::prefix('/product')->name('product.')->group(function(){
    Route::get('/{id}', function (int $id) {
        return "Product Number: $id";
    })->where('id','[0-9]+')->name('byid');

    Route::get('/{name}', function (string $name) {
        return "Product String: $name";
    })->where('name','[a-zA-Z]+')->name('byname');
    
    Route::get(
        '/{productId}/comment/{commentId}',
        function (int $productId, int $commentId) {
            return "Comment: $commentId of Product $productId";
        }
    )->name('comment');
    
    Route::get(
        '/{id}/share/{socialNetwork?}',
        function (int $id, string $socialNetwork = "facebook") {
            return "Share: $socialNetwork of Product $id";
        }
    )->name('share');
});

