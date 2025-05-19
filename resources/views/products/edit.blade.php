@extends('layout')
@section('title', 'Nouveau Produit')

@section('content')
    <h1>Modifier Produit</h1>
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- title --}}
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" placeholder="saisir le titre" value="{{$product->title}}">
            @error('title')
            <div class="error">{{ $message }}</div>
        @enderror
        </div>
        {{-- price --}}
        <div>
            <label for="price">Prix</label>
            <input type="number" name="price" placeholder="saisir le prix" value="{{$product->price}}">
            @error('price')
            <div class="error">{{ $message }}</div>
        @enderror
        </div>
        {{-- stock --}}
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" placeholder="saisir le stock" value="{{$product->stock}}">
        </div>
        {{-- image --}}
        <div>
            <label for="image">Image du produit</label>
            <input value="{{ old('image') }}" type="file" name="image" placeholder="Attacher une image">
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        {{-- description --}}
        <div>
            <label for="description">DEscription</label>
            <textarea name="description" id="" cols="30" rows="10">{{$product->description}}</textarea>
            @error('descriprion')
            <div class="error">{{ $message }}</div>
        @enderror
        </div>
        {{-- is_promo --}}
        <div>
            <input type="checkbox" name="is_promo" id="is_promo" @checked($product->is_promo)>
            <label for="is_promo">Est en Promo</label>
        </div>
        {{-- Category --}}
        <div>
            <label for="category_id">Categorie</label>
            <select name="category_id" id="category_id">
                <option value="" >Choisir une Catégorie</option>
                @foreach ($categories as $category)
                    <option 
                        value="{{ $category->id }}"
                        @selected($product->category_id == $category->id)
                        >{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" value="Enregistrer">
    </form>
@endsection
