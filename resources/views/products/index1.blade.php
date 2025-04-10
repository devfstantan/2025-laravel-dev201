<x-layout title="Liste Produits">

    <x-card>
        <h1>Liste Produits</h1>
        <x-button>Nouveau Produit</x-button>
        <x-button class="btn-secondary" onclick="alert('export...')">Exporter</x-button>
    </x-card>
    <table>
        <thead>
            <tr>
                <td></td>
                <td>titre</td>
                <td>prix</td>
                <td>stock</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
                {{-- quiter si nous somme aux 6eme element --}}
                @if ($loop->index >= 5)
                    @break
                @endif
                {{-- ne pas afficher les produits avec stock=0 --}}
                {{-- @if ($produit['stock'] <= 0)
                    @continue
                @endif --}}

                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{ $produit['title'] }}</td>
                    <td> <x-product-price :value="$produit['price']" /></td>
                    <td > <x-product-stock :value="$produit['stock']" /> </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
 