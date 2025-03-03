<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Blade Démo</h1>
    <h2>Nom: {{ $nom }}</h2>

    {{-- Dangeureux: disactiver l'échappement des caractères  --}}
    {!! $comment !!}

    {{-- Appele Fonction --}}
    <p>{{ Date::now() }}</p>

    {{-- Executer un code php --}}
    @php
        $showUserName = true;
        $couleur = 'green';
    @endphp

    {{-- Affichage conditionnel: --}}
    @if ($showUserName)
        <p>Username: User 1</p>
    @endif


    @if ($couleur == 'green')
        <p>Couleur verte</p>
    @elseif($couleur == 'red')
        <p>Couleur verte</p>
    @else
        <p>Autre couleur</p>
    @endif

    {{-- Si Utilsateur est connecté / non --}}
    @auth
        <p>Utilisateur Connecté</p>
    @else
        <p>Utilisateur non connecté</p>
    @endauth

    {{-- Guest --}}
    @guest
        <p>Utilisateur non Connecté</p>
    @else
        <p>Utilisateur connecté</p>
    @endguest

    {{-- isset() --}}
    @isset($produit)
        <p>Produit définit</p>
    @else
        <p>Produit non définit</p>
    @endisset


    {{-- Boucles --}}

    @php
        $liste = ['HTML', 'CSS', 'Javascript', 'PHP'];
    @endphp
    {{-- for --}}
    <ul>
        @for ($i = 0; $i < count($liste); $i++)
            <li>{{ $i }} - {{ $liste[$i] }}</li>
        @endfor
    </ul>
    {{-- foeach --}}
    <ul>
        @foreach ($liste as $key => $item)
            <li>{{ $key }} - {{ $item }}</li>
        @endforeach
    </ul>

    {{-- forelse --}}
    <ul>
        @forelse ($liste as $key => $item)
            <li>{{ $key }} - {{ $item }}</li>
        @empty
            Aucun Item
        @endforelse
    </ul>

   
    <style>
        .stock{
            border: 1px solid black;
            padding: 5px 10px;
        }
        .stock-success{
            border-color: green;
            color: green;
        }
        .stock-warning{
            border-color: orange;
            color: orange;
        }
        .stock-danger{
            border-color: red;
            color: red;
        }
    </style>
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
                    <td>{{ $produit['price'] }}</td>
                    <td @class([
                        "stock",
                        "stock-success" => $produit['stock'] >= 10,
                        "stock-warning" => $produit['stock'] >= 1 && $produit['stock'] < 10,
                        "stock-danger" => $produit['stock'] <= 0,
                    ])
                    >{{ $produit['stock'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
