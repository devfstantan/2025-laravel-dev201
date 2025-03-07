<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function listProduits(){
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
    
        return view('produits.index', compact('produits'));
    }

    public function create(){
        return view('produits.create');
    }
}
