@extends('layout')
@section('title', 'Nouveau Produit')

@section('content')
    <h1>Nouveau Produit</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        {{-- title --}}
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" placeholder="saisir le titre">
        </div>
        {{-- price --}}
        <div>
            <label for="price">Prix</label>
            <input type="number" name="price" placeholder="saisir le prix">
        </div>
        {{-- stock --}}
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" placeholder="saisir le stock">
        </div>
        {{-- description --}}
        <div>
            <label for="description">DEscription</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
        {{-- is_promo --}}
        <div>
            <input type="checkbox" name="is_promo" id="is_promo">
            <label for="is_promo">Est en Promo</label>
        </div>
        <input type="submit" value="Ajouter">
    </form>
@endsection
