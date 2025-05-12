@extends('layout')
@section('title', 'Nouveau Produit')

@section('content')
    <h1>Nouveau Produit</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        {{-- title --}}
        <div>
            <label for="title">Titre</label>
            <input value="{{ old('title') }}" type="text" name="title" placeholder="saisir le titre">
            {{-- Erreur de validation dial title --}}
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        {{-- price --}}
        <div>
            <label for="price">Prix</label>
            <input value="{{ old('price') }}" type="number" name="price" placeholder="saisir le prix">
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        {{-- stock --}}
        <div>
            <label for="stock">Stock</label>
            <input value="{{ old('stock') }}" type="number" name="stock" placeholder="saisir le stock">
            @error('stock')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        {{-- description --}}
        <div>
            <label for="description">DEscription</label>
            <textarea name="description" id="" cols="30" rows="1">{{ old('description') }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        {{-- is_promo --}}
        <div>
            <input @checked(old('is_promo')) type="checkbox" name="is_promo" id="is_promo">
            <label for="is_promo">Est en Promo</label>
            {{-- pas besoin de faire de valider --}}
        </div>
        {{-- Category --}}
        <div>
            <label for="category_id">Categorie</label>
            <select name="category_id" id="category_id">
                <option value="" >Choisir une Catégorie</option>
                @foreach ($categories as $category)
                    <option 
                        value="{{ $category->id }}"
                        @selected(old('category_id') == $category->id)
                        >{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" value="Ajouter">
    </form>
@endsection
