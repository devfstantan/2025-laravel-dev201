<?php

namespace App\Http\Controllers;

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
     */
    public function store(Request $request)
    {
        // 1- valider le formulaire:
        $validated = $request->validate([
            // 'title' => ['required','max:255','min:3'],
            'title' => 'required|max:255|min:3',
            'price' => 'required|numeric|min:0|max:1000000',
            'stock' => 'required|integer|min:0|max:1000',
            'image' => 'nullable|file|image|max:2048', // max:2Mo
            'description' => 'nullable',
            'category_id' => 'nullable|exists:categories,id'
        ]);
        // 2- uploader l'image dans le filesystem
        if($request->has('image')){
            $path = $request->file('image')->store('products','public');
            $validated['image'] = "/storage/".$path;
        }
        
        // 3- créer le produit
        $validated['is_promo'] = $request->has('is_promo');
        Product::create($validated);

        return to_route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        // 1- valider le formulaire:
        $validated = $request->validate([
            'title' => 'required|max:255|min:3',
            'price' => 'required|numeric|min:0|max:1000000',
            'stock' => 'required|integer|min:0|max:1000',
            'image' => 'nullable|file|image|max:2048', // max:2Mo
            'description' => 'nullable',
            'category_id' => 'nullable|exists:categories,id'
        ]);
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
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return to_route('products.index');
    }
}
