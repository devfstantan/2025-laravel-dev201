@extends('layout')
@section('title', 'Inscription')

@section('content')
    <h1>Inscription</h1>

    <form action="{{ route('auth.signup.store') }}" method="POST">
        @csrf
        {{-- Name --}}
        <div>
            <label for="name">Nom Complet</label>
            <input type="text" name="name" id="name" placeholder="saisir votre nom" value="{{ old('name') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email">Adresse Email</label>
            <input type="email" name="email" id="email" placeholder="nom.prenom@mail.com"
                value="{{ old('email') }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- password --}}
        <div>
            <label for="email">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Saisir votre mot de passe">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- password_confirmation --}}
        <div>
            <label for="password_confirmation">Confirmer Mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                placeholder="Confirmer votre mot de passe">
            @error('password_confirmation')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit --}}
        <input type="submit" value="S'inscrire">
    </form>
@endsection
