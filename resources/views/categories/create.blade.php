@extends('layout')
@section('title', "Nouvelle Catégorie")

@section('content')
    <h1>Nouvelle Catégorie</h1>

    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="saisir le nom">
        <input type="submit" value="Ajouter">
    </form>
@endsection
