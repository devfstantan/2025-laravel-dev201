@extends('layout')
@section('title', "Modifier Catégorie")

@section('content')
    <h1>Modifier Catégorie</h1>

    <form action="{{route('categories.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input 
        type="text" 
        name="name" 
        placeholder="saisir le nom"
        value="{{$category->name}}"
        >
        <input type="submit" value="Modifier">
    </form>
@endsection
