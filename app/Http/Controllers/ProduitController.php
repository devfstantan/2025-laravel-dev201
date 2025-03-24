<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    public function listProduits(){
        $produits = DB::table('produits')
        // ->select(['title','price'])
        ->where('price','<', 100)
        ->orWhere('price', '>=', 1000)
        // ->orderBy('price','desc')
        ->latest('price')
        ->get();
        dd($produits);

        // $data = DB::table('produits')
        // ->selectRaw('count(*) as nb_produits , categorie_id')
        // ->where('price', '>=', 200)
        // ->groupBy('categorie_id')
        // ->having('nb_produits','>=',10)
        // ->get();
        
        // dd($data);
    
        return view('produits.index', compact('produits'));
    }

    public function create(){
        return view('produits.create');
    }
}
