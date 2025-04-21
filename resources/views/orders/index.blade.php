@extends('layout')
@section('title', 'Liste Commandes')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Date Création</th>
                <th>Téléphone</th>
                <th>Etat</th>
                <th>Prix Total</th>
                <th>Nombre Produits</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>
                        <a href="{{ route('orders.show', $order) }}">
                            {{ $order->created_at }}
                        </a>
                    </td>
                    <td>{{ $order->phone }}</td>
                    <td><x-order-status :value="$order->status" /></td>
                    <td> <x-product-price :value="$order->price_total" /></td>
                    <td>{{ $order->products_count }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
