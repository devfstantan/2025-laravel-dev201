<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('title')->paginate();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * SOLID
     * S : Single Responsability: function/component ms2oul 3la 7aja w7da
     */
    public function store(ProductStoreRequest $request)
    {
        $validated = $request->validated();

        // 1- uploader l'image dans le filesystem
        if($request->has('image')){
            $path = $request->file('image')->store('products','public');
            $validated['image'] = "/storage/".$path;
        }
        
        // 2- créer le produit
        $validated['is_promo'] = $request->has('is_promo');
        Product::create($validated);

        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $validated = $request->validated();

        // 2- uploader l'image dans le filesystem
        if($request->has('image')){
            // DELETE old image if exists
            if($product->image){
                $path = str_replace('/storage/','',$product->image);
                Storage::disk('public')->delete($path);
            }

            $path = $request->file('image')->store('products','public');
            $validated['image'] = "/storage/".$path;
        }

        // 3- modifier le produit
        $validated['is_promo'] = $request->has('is_promo');
        $product->update($validated);

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     * Depency ingection
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index');
    }
}
