@extends('layout')
@section('title', "Modifier Catégorie")

@section('content')
    <h1>Modifier Catégorie</h1>

    <form action="{{route('categories.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        
        {{-- Name --}}
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" placeholder="saisir le nom" value="{{ $category->name }}">
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        {{-- Submit --}}
        <input type="submit" value="Modifier">
    </form>
@endsection
