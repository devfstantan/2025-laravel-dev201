@extends('layout')
@section('title', 'Nouvelle Catégorie')

@section('content')
    <h1>Nouvelle Catégorie</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        {{-- Name --}}
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" placeholder="saisir le nom" value="{{ old('name') }}">
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        {{-- Submit --}}
        <input type="submit" value="Ajouter">
    </form>
@endsection
