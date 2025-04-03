@extends('layout')
@section('title', "Liste Produits")

@section('content')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>
                    <a href="{{route('categories.create')}}">
                        Nouvelle Catégorie
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>
                        <a href="{{route('categories.show',$cat->id)}}">
                            {{$cat->name}}
                        </a>
                    </td>
                    <td>
                        {{-- Lien vers edit --}}
                        <a href="{{route('categories.edit',$cat->id)}}">
                            Editer  
                        </a>

                        {{-- Bouton supprimer --}}
                        <form action="{{route('categories.destroy',$cat->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Supprimer">
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
