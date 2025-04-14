@extends('layout')
@section('title', "Liste Produits")

@section('content')
    <x-card>
        <h1>Liste Utilisateurs</h1>
  </x-card>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Email</th>
                <th>CIN</th>
                <th>Ville naissance</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->profile->cin}}</td>
                    <td>{{ $user->profile->birth_city}}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
