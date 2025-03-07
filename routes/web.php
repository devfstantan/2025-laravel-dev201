<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\Admin\ProduitController as AdminProduitController;
use App\Http\Controllers\User\ProduitController as UserProduitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::view('/', 'welcome')->name('home');

Route::get('/blade-demo', function(){
    $nom = "DEV201";
    $comment = "<p>Attaque XSS </p> <script>console.log('i got all your cookies')</script>";
    $produits = [
        ['title' => 'Produit1', 'price' => 100, 'stock' => 10],
        ['title' => 'Produit2', 'price' => 10, 'stock' => 0],
        ['title' => 'Produit3', 'price' => 200, 'stock' => 9],
        ['title' => 'Produit3', 'price' => 200, 'stock' => 100],
        ['title' => 'Produit3', 'price' => 200, 'stock' => 100],
        ['title' => 'Produit3', 'price' => 200, 'stock' => 100],
        ['title' => 'Produit3', 'price' => 200, 'stock' => 100],
        ['title' => 'Produit3', 'price' => 200, 'stock' => 100],
        ['title' => 'Produit3', 'price' => 200, 'stock' => 100],
        ['title' => 'Produit3', 'price' => 200, 'stock' => 100],
    ];
    // return view('demo.blade-demo',[
    //     "nom" => $nom,
    //     "comment" => $comment,
    //      "produits" =>$produits
    // ]);
    return view('demo.blade-demo',compact('nom','comment','produits'));
});

// page liste produits
Route::get(
    '/produits', 
    [ProduitController::class, 'listProduits']
);

// page formulaire creation produit
Route::get('/produits/create',[ProduitController::class, 'create']);


Route::resource("/categories",CategoryController::class)
    // ->except(["create", "store"])
    ->only(['index','show']);

Route::resource('/admin/produits',AdminProduitController::class);
Route::resource('user/produits',UserProduitController::class);