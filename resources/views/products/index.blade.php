@extends('layout')
@section('title', "Liste Produits")

@section('content')
    <x-card>
        <h1>Liste Produits</h1>
        <a href="{{route('products.create')}}">Nouveau Produit</a>
     </x-card>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>titre</th>
                <th>Catégorie</th>
                <th>prix</th>
                <th>stock</th>
                <th>En Promotion?</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>
                        <a href="{{route('products.show',$product->id)}}">
                            {{ $product->title }}
                        </a>
                    </td>
                    <td>
                        @isset($product->category)
                        {{$product->category->name}}
                        @endisset
                    </td>
                    <td> <x-product-price :value="$product->price" /></td>
                    <td> <x-product-stock :value="$product->stock" /> </td>
                    <td>{{$product->is_promo ? "Oui":"Non"}}</td>
                    <td>
                        {{-- Lien editer --}}
                        <a href="{{route('products.edit',$product->id)}}">
                            Editer
                        </a>
                        {{-- formulaire supprimer --}}
                        {{-- Bouton supprimer --}}
                        <form action="{{route('products.destroy',$product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer">
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->links()}}
@endsection
