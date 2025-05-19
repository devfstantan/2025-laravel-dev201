@extends('layout')
@section('title', 'Détails catégorie')

@section('content')
    <h1>{{ $product->title }}</h1>
    @isset($product->image)
        <img src="{{$product->image}}" alt="">
    @endisset
    <ul>
        <li>Prix: <x-product-price :value="$product->price" /></li>
        <li>Stock: <x-product-stock :value="$product->stock" /> </li>
         <li>En Pomotion: {{$product->is_promo ? "Oui":"Non"}} </li>
    </ul>
    <p>{{$product->description}}</p>
@endsection
