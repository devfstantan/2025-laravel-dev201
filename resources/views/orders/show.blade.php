@extends('layout')
@section('title', 'Détails Commande')

@section('content')
    <ul>
        <li>Date Création: {{ $order->created_at }}</li>
        <li>Etat: <x-order-status :value="$order->status" /></li>
        <li>Prix Total: <x-product-price :value="$order->price_total" /></li>
    </ul>

    <table>
        <thead>
            <tr>
                <th>titre</th>
                <th>prix</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $product)
                <tr>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">
                            {{ $product->title }}
                        </a>
                    </td>

                    <td> <x-product-price :value="$product->price" /></td>
                    <td>
                        {{ $product->pivot->quantity }}
                    </td>
                    <td>
                        <x-product-price :value="$product->price * $product->pivot->quantity" />
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
