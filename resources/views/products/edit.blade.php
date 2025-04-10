@extends('layout')
@section('title', 'Nouveau Produit')

@section('content')
    <h1>Nouveau Produit</h1>
    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- title --}}
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" placeholder="saisir le titre" value="{{$product->title}}">
        </div>
        {{-- price --}}
        <div>
            <label for="price">Prix</label>
            <input type="number" name="price" placeholder="saisir le prix" value="{{$product->price}}">
        </div>
        {{-- stock --}}
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" placeholder="saisir le stock" value="{{$product->stock}}">
        </div>
        {{-- description --}}
        <div>
            <label for="description">DEscription</label>
            <textarea name="description" id="" cols="30" rows="10">{{$product->description}}</textarea>
        </div>
        {{-- is_promo --}}
        <div>
            <input type="checkbox" name="is_promo" id="is_promo" @checked($product->is_promo)>
            <label for="is_promo">Est en Promo</label>
        </div>
        <input type="submit" value="Enregistrer">
    </form>
@endsection
